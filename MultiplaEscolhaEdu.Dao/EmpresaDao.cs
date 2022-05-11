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
    public class EmpresaDao
    {
        public EmpresaModel CarregarDados()
        {
            EmpresaModel Empresa = null;

            try
            {
                using (MultiplaEscolhaEduContext ctx = new MultiplaEscolhaEduContext())
                {
                    Empresa = (from a in ctx.Empresas
                                select new EmpresaModel
                                {
                                    Id = a.Id,
                                    NomeFantasia = a.NomeFantasia,
                                    RazaoSocial = a.RazaoSocial,
                                    Cnpj = a.Cnpj,
                                    InscricaoEstadual = a.InscricaoEstadual,
                                    Telefone = a.Telefone,
                                    Celular = a.Celular,
                                    Email = a.Email,
                                    Cep = a.Cep,
                                    Logradouro = a.Logradouro,
                                    Numero = a.Numero,
                                    Complemento = a.Complemento,
                                    Bairro = a.Bairro,
                                    Cidade = a.Cidade,
                                    Estado = a.Estado,
                                }).FirstOrDefault();
                }
            }
            catch (Exception)
            {
                return null;
            }

            return Empresa;
        }

        public string GravarDados(EmpresaModel model)
        {
            bool novoRegistro = false;

            try
            {
                using (MultiplaEscolhaEduContext ctx = new MultiplaEscolhaEduContext())
                {
                    var a = ctx.Empresas.Find(model.Id);

                    if (a == null)
                    {
                        a = new Empresa();
                        a.DataCadastro = DateTime.Now;
                        novoRegistro = true;
                    }
                    else
                    {
                        novoRegistro = false;
                    }

                    a.NomeFantasia = model.NomeFantasia;
                    a.RazaoSocial = model.RazaoSocial;
                    a.Cnpj = model.Cnpj;
                    a.InscricaoEstadual = model.InscricaoEstadual == null ? "" : model.InscricaoEstadual;
                    a.Telefone = model.Telefone;
                    a.Celular = model.Celular;
                    a.Email = model.Email;
                    a.Cep = model.Cep;
                    a.Logradouro = model.Logradouro;
                    a.Numero = model.Numero;
                    a.Complemento = model.Complemento == null ? "" : model.Complemento;
                    a.Bairro = model.Bairro;
                    a.Cidade = model.Cidade;
                    a.Estado = model.Estado;
                    a.UltimaAtualizacao = DateTime.Now;

                    if (novoRegistro == true)
                    {
                        ctx.Empresas.Add(a);
                    }
                    else
                    {
                        ctx.Empresas.Attach(a);
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
    }
}
