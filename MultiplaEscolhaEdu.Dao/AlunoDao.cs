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
    public class AlunoDao : IDao<AlunoModel>
    {
        public AlunoModel CarregarDados(int id)
        {
            AlunoModel aluno = null;

            try
            {
                using (MultiplaEscolhaEduContext ctx = new MultiplaEscolhaEduContext())
                {
                    aluno = (from a in ctx.Alunos
                             where a.Id == id
                             select new AlunoModel
                             {
                                 Id = a.Id,
                                 Bairro = a.Bairro,
                                 Cep = a.Cep,
                                 Cidade = a.Cidade,
                                 Complemento = a.Complemento,
                                 Cpf = a.Cpf,
                                 DataNascimento = Convert.ToDateTime(a.DataNascimento).ToString("yyyy-MM-dd"),
                                 Email = a.Email,
                                 Estado = a.Estado,
                                 Investimento = a.Investimento,
                                 Logradouro = a.Logradouro,
                                 MelhorDataPagamento = a.MelhorDataPagamento,
                                 Nome = a.Nome,
                                 Rg = a.Rg,
                                 Whatsapp = a.Whatsapp
                             }).FirstOrDefault();
                }
            }
            catch (Exception)
            {
                return null;
            }

            return aluno;
        }

        public string Excluir(int id)
        {
            try
            {
                using (MultiplaEscolhaEduContext ctx = new MultiplaEscolhaEduContext())
                {
                    var dadosAluno = ctx.Alunos.FirstOrDefault( c=> c.Id == id);

                    if (dadosAluno != null)
                    {
                        int matriculaAluno = ctx.Matriculas.Count(c => c.IdAluno == dadosAluno.Id);

                        if (matriculaAluno == 0)
                        {
                            ctx.Alunos.Remove(dadosAluno);
                            ctx.SaveChanges();
                            return "Ok";
                        }
                        else
                        {
                            return "Não foi possível realizar a exclusão: Existe(m) matrícula(s) realizadas neste aluno! Impossível excluir.";
                        }
                    }
                    else
                    {
                        return "Dados do aluno não encontrado.";
                    }
                }
            }
            catch (Exception ex)
            {
                return "Não foi possível realizar a exclusão:" + ex.Message.ToString();
            }
        }

        public string Gravar(AlunoModel model)
        {
            bool novoRegistro = false;

            try
            {
                using (MultiplaEscolhaEduContext ctx = new MultiplaEscolhaEduContext())
                {
                    var a = ctx.Alunos.FirstOrDefault(c => c.Id == model.Id);

                    if (a == null)
                    {
                        a = new Aluno();
                        a.DataCadastro = DateTime.Now;
                        novoRegistro = true;
                    }
                    else
                    {
                        novoRegistro = false;
                    }

                    bool existeCpf = ctx.Alunos.FirstOrDefault(c => c.Cpf == model.Cpf) != null ? true : false;

                    if (existeCpf == true && novoRegistro == true)
                    {
                        return "Cpf já cadastrado";
                    }
                    else
                    {

                        a.Bairro = model.Bairro;
                        a.Cep = model.Cep;
                        a.Cidade = model.Cidade;
                        a.Complemento = model.Complemento == null ? "" : model.Complemento;
                        a.Cpf = model.Cpf;
                        a.DataNascimento = Convert.ToDateTime(model.DataNascimento);
                        a.Email = model.Email;
                        a.Estado = model.Estado;
                        a.Investimento = model.Investimento;
                        a.Logradouro = model.Logradouro;
                        a.MelhorDataPagamento = model.MelhorDataPagamento;
                        a.Nome = model.Nome;
                        a.Rg = model.Rg;
                        a.Whatsapp = model.Whatsapp;
                        a.UltimaAtualizacao = DateTime.Now;

                        if (novoRegistro == true)
                        {
                            ctx.Alunos.Add(a);
                        }
                        else
                        {
                            ctx.Alunos.Attach(a);
                            ctx.Entry(a).State = EntityState.Modified;
                        }

                        ctx.SaveChanges();
                        return "Ok";
                    }
                }
            }
            catch (Exception ex)
            {
                return "Não foi possível realizar a gravação de dados:" + ex.Message.ToString();
            }
        }

        public List<AlunoModel> ListarDados()
        {
            List<AlunoModel> lista = null;

            try
            {
                using (MultiplaEscolhaEduContext ctx = new MultiplaEscolhaEduContext())
                {
                    var aluno = (from a in ctx.Alunos
                                 select new
                                 {
                                     Id = a.Id,
                                     Nome = a.Nome,
                                     Cpf = a.Cpf,
                                     Email = a.Email,
                                     Whatsapp = a.Whatsapp,
                                     Cidade = a.Cidade,
                                     Estado = a.Estado
                                 }).ToList();

                    if (aluno != null)
                    {
                        lista = new List<AlunoModel>();

                        foreach (var item in aluno)
                        {
                            lista.Add(new AlunoModel
                            {
                                Id = item.Id,
                                Nome = item.Nome,
                                Cpf = item.Cpf,
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
