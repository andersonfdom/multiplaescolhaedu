﻿using System;
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
                    var dados = ctx.Cursos.Find(id);

                    if (dados != null)
                    {
                        model = new CursoModel
                        {
                            Descricao = dados.Descricao,
                            Id = dados.Id,
                            IdCategoriaCurso = dados.IdCategoriaCurso,
                            Slug = dados.Slug,
                            Valor = dados.Valor
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

        public string Excluir(int id)
        {
            try
            {
                using (MultiplaEscolhaEduContext ctx = new MultiplaEscolhaEduContext())
                {
                    var dados = ctx.Cursos.Find(id);

                    if (dados != null)
                    {
                        int matriculaCurso = ctx.Matriculas.Count(c => c.IdCurso == dados.Id);

                        if (matriculaCurso == 0)
                        {
                            ctx.Cursos.Remove(dados);
                            ctx.SaveChanges();
                            return "Ok";
                        }
                        else
                        {
                            return "Não foi possível realizar a exclusão: Existe(m) matrícula(s) realizadas neste curso! Impossível excluir.";
                        }
                    }
                    else
                    {
                        return "Dados do curso não encontrado.";
                    }
                }
            }
            catch (Exception ex)
            {
                return "Não foi possível realizar a exclusão:" + ex.Message.ToString();
            }
        }

        public string Gravar(CursoModel model)
        {
            bool novoRegistro = false;

            try
            {
                using (MultiplaEscolhaEduContext ctx = new MultiplaEscolhaEduContext())
                {
                    var dados = ctx.Cursos.Find(model.Id);

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
                    dados.Valor = model.Valor;

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
                    return "Ok";
                }
            }
            catch (Exception ex)
            {
                return "Não foi possível realizar a gravação de dados:" + ex.Message.ToString();
            }
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
                                Valor = item.Valor
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
