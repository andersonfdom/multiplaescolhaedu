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
    public class CursoDao 
    {
        public CursoModel CarregarDados(int id)
        {
            CursoModel model = null;

            try
            {
                using (MultiplaEscolhaEduContext ctx = new MultiplaEscolhaEduContext())
                {
                    var dados = ctx.Cursos.FirstOrDefault(c => c.Id == id);

                    if (dados != null)
                    {
                        model = new CursoModel
                        {
                            Descricao = dados.Descricao,
                            Id = dados.Id,
                            IdCategoriaCurso = dados.IdCategoriaCurso,
                            Slug = dados.Slug,
                            Valor = String.Format("{0:0,0.00}", dados.Valor) 
                        };
                    }
                }
            }
            catch (Exception)
            {
                return null;
            }

            return model;
        }

        public MensagemRetorno Excluir(int id)
        {
            MensagemRetorno mensagemRetorno = new MensagemRetorno();

            try
            {
                using (MultiplaEscolhaEduContext ctx = new MultiplaEscolhaEduContext())
                {
                    var dados = ctx.Cursos.FirstOrDefault(c => c.Id == id);

                    if (dados != null)
                    {
                        int matriculaCurso = ctx.Matriculas.Count(c => c.IdCurso == dados.Id);

                        if (matriculaCurso == 0)
                        {
                            ctx.Cursos.Remove(dados);
                            ctx.SaveChanges();
                            mensagemRetorno.Sucesso = true;
                            mensagemRetorno.Mensagem = "Curso excluído com sucesso!";
                        }
                        else
                        {
                            mensagemRetorno.Sucesso = false;
                            mensagemRetorno.Mensagem = "Não foi possível realizar a exclusão: Existe(m) matrícula(s) realizadas neste curso! Impossível excluir.";
                        }
                    }
                    else
                    {
                        mensagemRetorno.Sucesso = false;
                        mensagemRetorno.Mensagem = "Dados do curso não encontrado.";
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

        public MensagemRetorno Gravar(CursoModel model)
        {
            bool novoRegistro = false;
            MensagemRetorno mensagemRetorno = new MensagemRetorno();

            try
            {
                using (MultiplaEscolhaEduContext ctx = new MultiplaEscolhaEduContext())
                {
                    var dados = ctx.Cursos.FirstOrDefault(c => c.Id == model.Id);

                    if (dados == null)
                    {
                        dados = new Curso();
                        dados.DataCadastro = DateTime.Now;
                        novoRegistro = true;
                    }
                    else
                    {
                        novoRegistro = false;
                    }

                    dados.Descricao = model.Descricao;
                    dados.IdCategoriaCurso = model.IdCategoriaCurso;
                    dados.Slug = model.Slug;
                    dados.UltimaAtualizacao = DateTime.Now;
                    dados.Valor = Convert.ToDecimal(model.Valor);

                    if (novoRegistro == true)
                    {
                        ctx.Cursos.Add(dados);
                    }
                    else
                    {
                        ctx.Cursos.Attach(dados);
                        ctx.Entry(dados).State = EntityState.Modified;
                    }

                    ctx.SaveChanges();
                    mensagemRetorno.Sucesso = true;
                    mensagemRetorno.Mensagem ="Dados Curso gravado com sucesso!";
                }
            }
            catch (Exception ex)
            {
                mensagemRetorno.Sucesso = false;
                mensagemRetorno.Mensagem = "Não foi possível realizar a gravação de dados:" + ex.Message.ToString();
            }

            return mensagemRetorno;
        }

        public List<CursoConsulta> ListarDados()
        {
            List<CursoConsulta> lista = null;

            try
            {
                using (MultiplaEscolhaEduContext ctx = new MultiplaEscolhaEduContext())
                {
                    var cursos = (from c in ctx.Cursos
                                  join t in ctx.CategoriaCursos on c.IdCategoriaCurso equals t.Id
                                  select new
                                  {
                                      Id = c.Id,
                                      Descricao = c.Descricao,
                                      Valor = c.Valor,
                                      CategoriaCurso = t.Descricao
                                  }).ToList();

                    if (cursos != null && cursos.Count() >0 )
                    {
                        lista = new List<CursoConsulta>();
                        foreach (var item in cursos)
                        {
                            lista.Add(new CursoConsulta
                            {
                                CategoriaCurso = item.CategoriaCurso,
                                Descricao = item.Descricao,
                                Id = item.Id,
                                Valor = String.Format("{0:0,0.00}", item.Valor)  
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
