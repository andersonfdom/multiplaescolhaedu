using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using MultiplaEscolhaEdu.Model;
using MultiplaEscolhaEdu.Dao.Models;
using System.Collections;
using Microsoft.EntityFrameworkCore;

namespace MultiplaEscolhaEdu.Dao
{
    public class ParceiroDao : IDao<ParceiroModel>
    {
        public ParceiroModel CarregarDados(int id)
        {
            ParceiroModel Parceiro = null;

            try
            {
                using (MultiplaEscolhaEduContext ctx = new MultiplaEscolhaEduContext())
                {
                    Parceiro = (from a in ctx.Parceiros
                                where a.Id == id
                                select new ParceiroModel
                                {
                                    Id = a.Id,
                                    Bairro = a.Bairro,
                                    Cep = a.Cep,
                                    Cidade = a.Cidade,
                                    Complemento = a.Complemento,
                                    Email = a.Email,
                                    Estado = a.Estado,
                                    Logradouro = a.Logradouro,
                                    NomeCompleto = a.NomeCompleto,
                                    Whatsapp = a.Whatsapp
                                }).FirstOrDefault();
                }
            }
            catch (Exception)
            {
                return null;
            }

            return Parceiro;
        }

        public string Excluir(int id)
        {
            try
            {
                using (MultiplaEscolhaEduContext ctx = new MultiplaEscolhaEduContext())
                {
                    var dadosParceiro = ctx.Parceiros.FirstOrDefault( c=> c.Id ==id);

                    if (dadosParceiro != null)
                    {
                        int matriculaParceiro = ctx.Matriculas.Count(c => c.IdParceiro == dadosParceiro.Id);

                        if (matriculaParceiro != 0)
                        {
                            return "Não foi possível realizar a exclusão: Existe(m) matrícula(s) realizadas por este Parceiro! Impossível excluir.";
                        }

                        bool parceiroPrincipal = ctx.Parceiros.FirstOrDefault(c => c.Id == ctx.Empresas.FirstOrDefault().Id) != null ? true : false;
                        
                        if(parceiroPrincipal == true)
                        {
                            return "Este parceiro não pode ser excluído.";
                        }

                        ctx.Parceiros.Remove(dadosParceiro);
                        ctx.SaveChanges();
                        return "Ok";
                    }
                    else
                    {
                        return "Dados do Parceiro não encontrado.";
                    }
                }
            }
            catch (Exception ex)
            {
                return "Não foi possível realizar a exclusão:" + ex.Message.ToString();
            }
        }

        public string Gravar(ParceiroModel model)
        {
            bool novoRegistro = false;

            try
            {
                using (MultiplaEscolhaEduContext ctx = new MultiplaEscolhaEduContext())
                {
                    var a = ctx.Parceiros.FirstOrDefault( c=> c.Id ==model.Id);

                    if (a == null)
                    {
                        a = new Parceiro();
                        a.DataCadastro = DateTime.Now;
                        novoRegistro = true;
                    }
                    else
                    {
                        novoRegistro = false;
                    }
                    a.Bairro = model.Bairro;
                    a.Cep = model.Cep;
                    a.Cidade = model.Cidade;
                    a.Complemento = model.Complemento == null ? "" : model.Complemento;
                    a.Email = model.Email;
                    a.Estado = model.Estado;
                    a.Logradouro = model.Logradouro;
                    a.NomeCompleto = model.NomeCompleto;
                    a.Whatsapp = model.Whatsapp;
                    a.UltimaAtualizacao = DateTime.Now;

                    if (novoRegistro == true)
                    {
                        ctx.Parceiros.Add(a);
                    }
                    else
                    {
                        ctx.Parceiros.Attach(a);
                        ctx.Entry(a).State = EntityState.Modified;
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

        public List<ParceiroModel> ListarDados()
        {
            List<ParceiroModel> lista = null;

            try
            {
                using (MultiplaEscolhaEduContext ctx = new MultiplaEscolhaEduContext())
                {
                    var Parceiro = (from a in ctx.Parceiros
                                    select new
                                    {
                                        Id = a.Id,
                                        NomeComplemto = a.NomeCompleto,
                                        Email = a.Email,
                                        Whatsapp = a.Whatsapp,
                                        Cidade = a.Cidade,
                                        Estado = a.Estado
                                    }).ToList();

                    if (Parceiro != null)
                    {
                        lista = new List<ParceiroModel>();

                        foreach (var item in Parceiro)
                        {
                            lista.Add(new ParceiroModel
                            {
                                Id = item.Id,
                                NomeCompleto = item.NomeComplemto,
                                Email = item.Email,
                                Whatsapp = item.Whatsapp,
                                Cidade = item.Cidade,
                                Estado = item.Estado
                            });
                        }
                    }
                }
            }
            catch (Exception)
            {
                return null;
            }

            return lista;
        }
    }
}
