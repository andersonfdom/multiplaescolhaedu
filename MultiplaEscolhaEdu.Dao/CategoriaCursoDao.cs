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
    public class CategoriaCursoDao
    {
        public List<CategoriaCurso> Listar()
        {
            try
            {
                using (MultiplaEscolhaEduContext ctx = new MultiplaEscolhaEduContext())
                {
                    return ctx.CategoriaCursos.ToList();
                }
            }
            catch (Exception)
            {
                return null;
            }
        }

        public int Gravar(CategoriaCursoModel model)
        {
            try
            {
                using (MultiplaEscolhaEduContext ctx = new MultiplaEscolhaEduContext())
                {
                    CategoriaCurso c = new CategoriaCurso
                    {
                        DataCadastro = DateTime.Now,
                        Descricao = model.Descricao,
                        Id = 0,
                        UltimaAtualizacao = DateTime.Now
                    };

                    ctx.CategoriaCursos.Add(c);
                    ctx.SaveChanges();

                    return c.Id;
                }
            }
            catch (Exception)
            {
                return 0;
            }
        }
    }
}
