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
    public class MatriculaDao
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

        public MensagemRetorno Excluir(int id)
        {
            MensagemRetorno mensagemRetorno = new MensagemRetorno();

            try
            {
                using (MultiplaEscolhaEduContext ctx = new MultiplaEscolhaEduContext())
                {
                    var dados = ctx.Matriculas.FirstOrDefault(c => c.Id == id);

                    if (dados != null)
                    {
                        ctx.Matriculas.Remove(dados);
                        ctx.SaveChanges();
                        mensagemRetorno.Sucesso = true;
                        mensagemRetorno.Mensagem = "Dados Matrícula excluído com sucesso!";
                    }
                    else
                    {
                        mensagemRetorno.Sucesso = false;
                        mensagemRetorno.Mensagem = "Dados da Matrícula não encontrado.";
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

        public MensagemRetorno Gravar(MatriculaModel model)
        {
            bool novoRegistro = false;
            MensagemRetorno mensagemRetorno = new MensagemRetorno();

            try
            {
                using (MultiplaEscolhaEduContext ctx = new MultiplaEscolhaEduContext())
                {
                    var dados = ctx.Matriculas.FirstOrDefault(c => c.Id == model.Id);

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
                    dados.IdAlunoNavigation = ctx.Alunos.FirstOrDefault(c => c.Id == model.IdAluno);
                    dados.IdCurso = model.IdCurso;
                    dados.IdCursoNavigation = ctx.Cursos.FirstOrDefault(c => c.Id == model.IdCurso);
                    dados.IdParceiro = model.IdParceiro;
                    dados.Status = model.Status;

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
                    mensagemRetorno.Sucesso = true;
                    mensagemRetorno.Mensagem = "Matrícula excluída com sucesso!";
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
