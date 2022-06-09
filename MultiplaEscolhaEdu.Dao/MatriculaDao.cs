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
    public class MatriculaDao : IDao<MatriculaModel>
    {
        public MatriculaModel CarregarDados(int id)
        {

            try
            {
                using (MultiplaEscolhaEduContext ctx = new MultiplaEscolhaEduContext())
                {
                    return (from m in ctx.Matriculas
                            where m.Id == id
                            select new MatriculaModel
                            {
                                DataMatricula = m.DataMatricula,
                                Id = m.Id,
                                IdAluno = m.IdAluno,
                                IdCurso = m.IdCurso,
                                IdParceiro = m.IdParceiro,
                                Status = m.Status
                            }).FirstOrDefault();
                }
            }
            catch (Exception)
            {
                return null;
            }
        }

        public string Excluir(int id)
        {
            try
            {
                using (MultiplaEscolhaEduContext ctx = new MultiplaEscolhaEduContext())
                {
                    var dados = ctx.Matriculas.Find(id);

                    if (dados != null)
                    {
                        ctx.Matriculas.Remove(dados);
                        ctx.SaveChanges();
                        return "Ok";
                    }
                    else
                    {
                        return "Dados da Matrícula não encontrado.";
                    }
                }
            }
            catch (Exception ex)
            {
                return "Não foi possível realizar a exclusão:" + ex.Message.ToString();
            }
        }

        public string Gravar(MatriculaModel model)
        {
            bool novoRegistro = false;

            try
            {
                using (MultiplaEscolhaEduContext ctx = new MultiplaEscolhaEduContext())
                {
                    var dados = ctx.Matriculas.Find(model.Id);

                    if (dados == null)
                    {
                        dados = new Matricula();
                        novoRegistro = true;
                    }
                    else
                    {
                        novoRegistro = false;
                    }

                    dados.DataMatricula = model.DataMatricula;
                    dados.IdAluno = model.IdAluno;
                    dados.IdAlunoNavigation = ctx.Alunos.Find(model.IdAluno);
                    dados.IdCurso = model.IdCurso;
                    dados.IdCursoNavigation = ctx.Cursos.Find(model.IdCurso);
                    dados.IdParceiro = model.IdParceiro;

                    if (novoRegistro == true)
                    {
                        ctx.Matriculas.Add(dados);
                    }
                    else
                    {
                        ctx.Matriculas.Attach(dados);
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

        public List<MatriculaModel> ListarDados()
        {
            throw new NotImplementedException();
        }

        public List<MatriculaConsulta> ListarMatriculas()
        {
            List<MatriculaConsulta> lista = null;

            try
            {
                using (MultiplaEscolhaEduContext ctx = new MultiplaEscolhaEduContext())
                {
                    var dados = (from m in ctx.Matriculas
                                 join a in ctx.Alunos on m.IdAluno equals a.Id
                                 join c in ctx.Cursos on m.IdCurso equals c.Id
                                 join p in ctx.Parceiros on m.IdParceiro equals p.Id
                                 select new
                                 {
                                     Id = m.Id,
                                     NomeAluno = a.Nome,
                                     NomeCurso = c.Descricao,
                                     NomeParceiro = p.NomeCompleto,
                                     StatusMatricula = m.Status,
                                     DataMatricula = m.DataMatricula
                                 }).ToList();

                    if (dados != null)
                    {
                        lista = new List<MatriculaConsulta>();

                        foreach (var item in dados)
                        {
                            lista.Add(new MatriculaConsulta
                            {
                                DataMatricula = item.DataMatricula,
                                Id = item.Id,
                                NomeAluno = item.NomeAluno,
                                NomeCurso = item.NomeCurso,
                                NomeParceiro = item.NomeParceiro,
                                StatusMatricula = item.StatusMatricula == 0 ? "Pendente" : item.StatusMatricula == 1 ? "Efetivada" : "Cancelada"
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

        public int QtdeAlunosCadastrados()
        {
            int qtde = 0;

            try
            {
                using (MultiplaEscolhaEduContext ctx = new MultiplaEscolhaEduContext())
                {
                    qtde = ctx.Alunos.Count();
                }
            }
            catch (Exception)
            {
                return 0;
            }

            return qtde;
        }

        public int QtdeCursosCadastrados()
        {
            int qtde = 0;

            try
            {
                using (MultiplaEscolhaEduContext ctx = new MultiplaEscolhaEduContext())
                {
                    qtde = ctx.Cursos.Count();
                }
            }
            catch (Exception)
            {
                return 0;
            }

            return qtde;
        }

        public int QtdeParceirosCadastrados()
        {
            int qtde = 0;

            try
            {
                using (MultiplaEscolhaEduContext ctx = new MultiplaEscolhaEduContext())
                {
                    qtde = ctx.Parceiros.Count();
                }
            }
            catch (Exception)
            {
                return 0;
            }

            return qtde;
        }

        public int QtdeMatriculasRealizadas()
        {
            try
            {
                using (MultiplaEscolhaEduContext ctx = new MultiplaEscolhaEduContext())
                {
                    return ctx.Matriculas.Count();
                }
            }
            catch (Exception)
            {
                return 0;
            }
        }
    }
}
