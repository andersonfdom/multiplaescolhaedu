using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using MultiplaEscolhaEdu.Model;
using MultiplaEscolhaEdu.Dao.Models;
using System.Collections;
using System.Net;
using Microsoft.EntityFrameworkCore;

namespace MultiplaEscolhaEdu.Dao
{
    public class UsuarioDao : Utils, IDao<UsuarioModel>
    {
        public UsuarioModel CarregarDados(int id)
        {
            try
            {
                using (MultiplaEscolhaEduContext ctx = new MultiplaEscolhaEduContext())
                {
                    var dados = (from u in ctx.Usuarios
                                 where u.Id == id
                                 select new UsuarioModel
                                 {
                                     Id = u.Id,
                                     IdEmpresa = u.IdEmpresa,
                                     IdParceiro = u.IdParceiro,
                                     LoginUsuario = u.LoginUsuario,
                                     Senha = u.Senha,
                                     Usuariologado = u.Usuariologado
                                 }).FirstOrDefault();

                    if (dados != null)
                    {
                        //dados.Senha = Descriptografar(dados.Senha);
                    }

                    return dados;
                }
            }
            catch (Exception e)
            {
                var erro = e;
                return null;
            }
        }

        public string Excluir(int id)
        {
            try
            {
                using (MultiplaEscolhaEduContext ctx = new MultiplaEscolhaEduContext())
                {
                    var dadosUsuario = ctx.Usuarios.FirstOrDefault( c=> c.Id ==id);

                    if (dadosUsuario != null)
                    {
                        if (dadosUsuario.Usuariologado == 1)
                        {
                            return $"Usuário não pode ser excluído, pois o usuário {dadosUsuario.LoginUsuario} está logado no sistema.";
                        }

                        if (dadosUsuario.Id == 1)
                        {
                            return "Este usuário não pode ser excluído";
                        }

                        var logUsuarios = ctx.Logusuarios.ToList();

                        if (logUsuarios != null)
                        {
                            foreach (var item in logUsuarios)
                            {
                                ctx.Logusuarios.Remove(item);
                                ctx.SaveChanges();
                            }
                        }

                        ctx.Usuarios.Remove(dadosUsuario);
                        ctx.SaveChanges();

                        return "Ok";
                    }
                    else
                    {
                        return "Dados do Usuário não encontrado.";
                    }
                }
            }
            catch (Exception)
            {

                throw;
            }
        }

        public string Gravar(UsuarioModel model)
        {
            bool novoRegistro = false;

            try
            {
                using (MultiplaEscolhaEduContext ctx = new MultiplaEscolhaEduContext())
                {
                    var dadosUsuario = ctx.Usuarios.FirstOrDefault( c=> c.Id ==model.Id);

                    if (dadosUsuario == null)
                    {
                        dadosUsuario = new Usuario
                        {
                            DataCadastro = DateTime.Now
                        };

                        novoRegistro = true;
                    }
                    else
                    {
                        novoRegistro = false;
                    }

                    var existeUsuarioAdmin = ctx.Usuarios.FirstOrDefault(c => c.LoginUsuario == model.LoginUsuario &&
                                                                              c.IdEmpresa == model.IdEmpresa &&
                                                                              c.IdParceiro == 0) != null ? true : false;

                    if (existeUsuarioAdmin == true)
                    {
                        return $"O usuário {model.LoginUsuario} já está cadastrado.";
                    }

                    var existeUsuarioParceiro = ctx.Usuarios.FirstOrDefault(c => c.LoginUsuario == model.LoginUsuario &&
                                                                                 c.IdEmpresa == 0 &&
                                                                                 c.IdParceiro == model.IdParceiro) != null ? true : false;

                    if (existeUsuarioParceiro == true)
                    {
                        return $"O usuário {model.LoginUsuario} já está cadastrado.";
                    }

                    dadosUsuario.Ativo = 1;
                    dadosUsuario.IdEmpresa = model.IdEmpresa;
                    dadosUsuario.IdParceiro = model.IdParceiro;
                    dadosUsuario.LoginUsuario = model.LoginUsuario;
                    dadosUsuario.Senha = Criptografar(model.Senha);
                    dadosUsuario.UltimoAcesso = DateTime.Now;
                    dadosUsuario.Usuariologado = model.Usuariologado;

                    if (novoRegistro == true)
                    {
                        ctx.Usuarios.Add(dadosUsuario);
                    }
                    else
                    {
                        ctx.Usuarios.Attach(dadosUsuario);
                        ctx.Entry(dadosUsuario).State = EntityState.Modified;
                    }

                    ctx.SaveChanges();
                    return "Ok";
                }
            }
            catch (Exception ex)
            {
                return "Não foi possível realizar a gravação de dados:" + ex.Message.ToString();
            }
        }

        public List<UsuarioModel> ListarDados()
        {
            throw new Exception();
        }

        public List<Usuario> ListarUsuariosAdmin()
        {
            try
            {
                using (MultiplaEscolhaEduContext ctx = new MultiplaEscolhaEduContext())
                {
                    return ctx.Usuarios.Where(c => c.IdParceiro == 0 && c.IdEmpresa == 1).ToList();
                }
            }
            catch (Exception)
            {
                return null;
            }
        }

        public List<Usuario> ListarUsuariosParceiro(int parceiroId)
        {
            try
            {
                using (MultiplaEscolhaEduContext ctx = new MultiplaEscolhaEduContext())
                {
                    return ctx.Usuarios.Where(c => c.IdParceiro == parceiroId && c.IdEmpresa == 0).ToList();
                }
            }
            catch (Exception)
            {
                return null;
            }
        }

        public Usuario RealizarLoginAdmin(string loginUsuario, string senha)
        {
            try
            {
                using (MultiplaEscolhaEduContext ctx = new MultiplaEscolhaEduContext())
                {
                    senha = Criptografar(senha);

                    var dadosUsuario = (from u in ctx.Usuarios
                                        where u.LoginUsuario == loginUsuario &&
                                        u.Senha == senha && u.IdParceiro == 0
                                        select new Usuario
                                        {
                                            Id = u.Id,
                                            IdEmpresa = u.IdEmpresa,
                                            LoginUsuario = u.LoginUsuario,
                                            Senha = u.Senha
                                        }).FirstOrDefault();

                    if (dadosUsuario != null)
                    {
                        var dadosUsuarioLogado = (from u in ctx.Usuarios
                                                  where u.Id == dadosUsuario.Id
                                                  select u).FirstOrDefault();

                        dadosUsuarioLogado.Usuariologado = 1;
                        ctx.Usuarios.Attach(dadosUsuarioLogado);
                        ctx.Entry(dadosUsuarioLogado).State = EntityState.Modified;
                        ctx.SaveChanges();

                        var ip = new WebClient().DownloadString("https://api.ipify.org");
                        Logusuario logusuario = new Logusuario
                        {
                            DataLog = DateTime.Now,
                            Descricao = "Realizou login",
                            IdUsuario = dadosUsuario.Id,
                            IpLogUsuarios = $"{ip}"
                        };

                        ctx.Logusuarios.Add(logusuario);
                        ctx.SaveChanges();

                        return dadosUsuario;
                    }
                    else
                    {
                        return null;
                    }
                }
            }
            catch (Exception ex)
            {
                return null;
            }
        }

        public Usuario RealizarLoginParceiro(string loginUsuario, string senha)
        {
            try
            {
                using (MultiplaEscolhaEduContext ctx = new MultiplaEscolhaEduContext())
                {
                    var dadosUsuario = (from u in ctx.Usuarios
                                        where u.LoginUsuario == loginUsuario &&
                                        u.Senha == Criptografar(senha) &&
                                        u.IdEmpresa == 0
                                        select new Usuario
                                        {
                                            Id = u.Id,
                                            IdEmpresa = u.IdEmpresa,
                                            LoginUsuario = u.LoginUsuario,
                                            Senha = u.Senha
                                        }).FirstOrDefault();
                                       
                    if (dadosUsuario != null)
                    {
                        var dadosUsuarioLogado = (from u in ctx.Usuarios
                                                  where u.Id == dadosUsuario.Id
                                                  select u).FirstOrDefault();

                        dadosUsuarioLogado.Usuariologado = 1;
                        ctx.Usuarios.Attach(dadosUsuarioLogado);
                        ctx.Entry(dadosUsuarioLogado).State = EntityState.Modified;
                        ctx.SaveChanges();

                        var ip = new WebClient().DownloadString("https://api.ipify.org");
                        Logusuario logusuario = new Logusuario
                        {
                            DataLog = DateTime.Now,
                            Descricao = "Realizou login",
                            IdUsuario = dadosUsuario.Id,
                            IpLogUsuarios = $"{ip}"
                        };

                        ctx.Logusuarios.Add(logusuario);
                        ctx.SaveChanges();

                        return dadosUsuario;
                    }
                    else
                    {
                        return null;
                    }
                }
            }
            catch (Exception)
            {
                return null;
            }
        }

        public bool RealizarLogoffAdmin(int idUsuario)
        {
            try
            {
                using (MultiplaEscolhaEduContext ctx = new MultiplaEscolhaEduContext())
                {
                    var dadosUsuario = ctx.Usuarios.FirstOrDefault(c => c.Id == idUsuario &&
                                                                        c.IdParceiro == 0);

                    if (dadosUsuario != null)
                    {
                        var dadosUsuarioLogado = (from u in ctx.Usuarios
                                                  where u.Id == dadosUsuario.Id
                                                  select u).FirstOrDefault();

                        dadosUsuarioLogado.Usuariologado = 0;
                        ctx.Usuarios.Attach(dadosUsuarioLogado);
                        ctx.Entry(dadosUsuarioLogado).State = EntityState.Modified;
                        ctx.SaveChanges();

                        var ip = new WebClient().DownloadString("https://api.ipify.org");
                        Logusuario logusuario = new Logusuario
                        {
                            DataLog = DateTime.Now,
                            Descricao = "Realizou logoff",
                            IdUsuario = dadosUsuario.Id,
                            IpLogUsuarios = $"{ip}"
                        };

                        ctx.Logusuarios.Add(logusuario);
                        ctx.SaveChanges();
                        return true;
                    }
                    else
                    {
                        return false;
                    }
                }
            }
            catch (Exception)
            {
                return false;
            }
        }

        public bool RealizarLogoffParceiro(int idUsuario)
        {
            try
            {
                using (MultiplaEscolhaEduContext ctx = new MultiplaEscolhaEduContext())
                {
                    var dadosUsuario = ctx.Usuarios.FirstOrDefault(c => c.Id == idUsuario &&
                                                                        c.IdEmpresa == 0);

                    if (dadosUsuario != null)
                    {
                        var dadosUsuarioLogado = (from u in ctx.Usuarios
                                                  where u.Id == dadosUsuario.Id
                                                  select u).FirstOrDefault();

                        dadosUsuarioLogado.Usuariologado = 0;
                        ctx.Usuarios.Attach(dadosUsuarioLogado);
                        ctx.Entry(dadosUsuarioLogado).State = EntityState.Modified;
                        ctx.SaveChanges();

                        var ip = new WebClient().DownloadString("https://api.ipify.org");
                        Logusuario logusuario = new Logusuario
                        {
                            DataLog = DateTime.Now,
                            Descricao = "Realizou logoff",
                            IdUsuario = dadosUsuario.Id,
                            IpLogUsuarios = $"{ip}"
                        };

                        ctx.Logusuarios.Add(logusuario);
                        ctx.SaveChanges();
                        return true;
                    }
                    else
                    {
                        return false;
                    }
                }
            }
            catch (Exception)
            {
                return false;
            }
        }
    }
}
