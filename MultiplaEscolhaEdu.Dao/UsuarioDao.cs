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
using System.Web;

namespace MultiplaEscolhaEdu.Dao
{
    public class UsuarioDao : Utils
    {
        private const string HeaderEmail = "https://admin.multiplaescolhaedu.andersondomingos.eti.br/img/logo.png";

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

        public MensagemRetorno Excluir(int id)
        {
            MensagemRetorno mensagemRetorno = new MensagemRetorno();
            try
            {
                using (MultiplaEscolhaEduContext ctx = new MultiplaEscolhaEduContext())
                {
                    var dadosUsuario = ctx.Usuarios.FirstOrDefault(c => c.Id == id);

                    if (dadosUsuario != null)
                    {
                        if (dadosUsuario.Usuariologado == 1)
                        {
                            mensagemRetorno.Sucesso = false;
                            mensagemRetorno.Mensagem = $"Usuário não pode ser excluído, pois o usuário {dadosUsuario.LoginUsuario} está logado no sistema.";
                        }

                        else if (dadosUsuario.Id == 1)
                        {
                            mensagemRetorno.Sucesso = false;
                            mensagemRetorno.Mensagem = "Este usuário não pode ser excluído";
                        }
                        else
                        {
                            var logUsuarios = ctx.Logusuarios.Where(c => c.IdUsuario == id).ToList();

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

                            mensagemRetorno.Sucesso = true;
                            mensagemRetorno.Mensagem = "Usuário excluído com sucesso!";

                        }
                    }
                    else
                    {
                        mensagemRetorno.Sucesso = false;
                        mensagemRetorno.Mensagem = "Dados do Usuário não encontrado.";
                    }
                }
            }
            catch (Exception ex)
            {
                mensagemRetorno.Sucesso = false;
                mensagemRetorno.Mensagem = "Não foi possível realizar a exclusão:" + ex.Message.ToString();
                return mensagemRetorno;
            }

            return mensagemRetorno;
        }

        public MensagemRetorno Gravar(UsuarioModel model)
        {
            bool novoRegistro = false;
            MensagemRetorno mensagemRetorno = new MensagemRetorno();
            try
            {
                using (MultiplaEscolhaEduContext ctx = new MultiplaEscolhaEduContext())
                {
                    var dadosUsuario = ctx.Usuarios.FirstOrDefault(c => c.Id == model.Id);

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

                    var existeUsuarioParceiro = ctx.Usuarios.FirstOrDefault(c => c.LoginUsuario == model.LoginUsuario &&
                                                                                 c.IdEmpresa == 0 &&
                                                                                 c.IdParceiro == model.IdParceiro) != null ? true : false;

                    if (existeUsuarioAdmin == true)
                    {
                        mensagemRetorno.Sucesso = false;
                        mensagemRetorno.Mensagem = $"O usuário {model.LoginUsuario} já está cadastrado no Admin.";
                    }
                    else if (existeUsuarioParceiro == true)
                    {
                        mensagemRetorno.Sucesso = false;
                        mensagemRetorno.Mensagem = $"O usuário {model.LoginUsuario} já está cadastrado no Parceiro.";
                    }
                    else
                    {
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
                        mensagemRetorno.Sucesso = true;
                        mensagemRetorno.Mensagem = "Usuário gravado com sucesso!";
                    }
                }
            }
            catch (Exception ex)
            {
                mensagemRetorno.Sucesso = false;
                mensagemRetorno.Mensagem = "Não foi possível realizar a gravação de dados:" + ex.Message.ToString();
                return mensagemRetorno;
            }

            return mensagemRetorno;
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
                        dadosUsuarioLogado.UltimoAcesso = DateTime.Now;
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

                        string corpoEmailCliente = string.Empty;

                        corpoEmailCliente += "<p>Prezado Cliente,</p>";
                        corpoEmailCliente += $"<p>O Usuário {loginUsuario}  </p>";
                        corpoEmailCliente += $"<p>logou em {DateTime.Now} </p>";
                        corpoEmailCliente += "<br />";
                        corpoEmailCliente += $"<p><img src='{HeaderEmail}'></p>";

                        var resposta = EnvioEmail("anderson.ferdomingos@gmail.com","Login módulo Admin" ,corpoEmailCliente, "Notificação Login Admin");

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

        public string GerarGuidRecuperacaoSenha()
        {
            return Guid.NewGuid().ToString("n").Substring(0, 12);
        }

        public MensagemRetorno RetornarDadosRecuperacaoSenhaAdmin(string email,string url)
        {
            MensagemRetorno model = new MensagemRetorno();

            try
            {
                using (MultiplaEscolhaEduContext ctx = new MultiplaEscolhaEduContext())
                {
                    var dados = (from c in ctx.Usuarios
                                 where c.LoginUsuario.Equals(email)
                                 select c).FirstOrDefault();

                    if (dados != null)
                    {
                        dados.SecretKey = GerarGuidRecuperacaoSenha();
                        ctx.SaveChanges();

                        model.Sucesso = true;
                        model.Mensagem = $"Foi enviado um e-mail para {dados.LoginUsuario}, solicitando a recuperação de senha. Favor acesse sua caixa de entrada," +
                            $"ou verifique se o mesmo está como spam, e siga as instruções no seu e-mail para a recuperação de senha.";


                        string corpoEmailCliente = string.Empty;
                        string urlEnvio = HttpUtility.HtmlEncode(url + "/RecuperarSenha?code=" + dados.SecretKey);

                        corpoEmailCliente += "   <p>Prezado Usuário,</p>";
                        corpoEmailCliente += $"   <p>Foi solicitado recuperação de senha para o login: {dados.LoginUsuario}.</p>";
                        corpoEmailCliente += "   <p><a href=\"" + urlEnvio + "\">Clique aqui para solicitar a recuperação de senha</a></p>";
                        corpoEmailCliente += "   <br />";
                        corpoEmailCliente += $"  <p><img src='{HeaderEmail}'></p>";

                        var resposta = EnvioEmail("anderson.ferdomingos@gmail.com", "Recuperação Senha módulo Admin", corpoEmailCliente, "Recuperação Senha módulo Admin");
                    }
                    else
                    {
                        model.Sucesso = true;
                        model.Mensagem = "E-mail não cadastrado. Favor entrar em contato com o Administrador.";
                    }
                }
            }
            catch (Exception e)
            {
                model.Sucesso = false;
                model.Mensagem = "Não foi possível realizar a recuperação de senha: " + e.InnerException.Message.ToString();
                return model;
            }

            return model;
        }
    }
}
