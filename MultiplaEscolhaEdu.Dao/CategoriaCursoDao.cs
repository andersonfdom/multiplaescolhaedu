using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using MultiplaEscolhaEdu.Model;
using Dapper;
using MySql.Data;
using MySql.Data.MySqlClient;

namespace MultiplaEscolhaEdu.Dao
{
    public class CategoriaCursoDao : clsConexao
    {
        string sql = "";

        public bool Inserir(CategoriaCurso categoriaCurso)
        {
            sql += "INSERT INTO categoria_cursos(descricao,data_cadastro,ultima_atualizacao)";
            sql += $"VALUES ('{categoriaCurso.Descricao}',now(),now());";

            using (var con = CriarConexao())
            {
                try
                {
                    con.Open();
                    con.Execute(sql);
                    return true;
                }
                catch (Exception ex)
                {
                    return false;
                }
                finally
                {
                    con.Close();
                }
            }
        }

        public List<CategoriaCurso> Listar()
        {
            List<CategoriaCurso> categoriaCursos = new List<CategoriaCurso>();

            sql += "SELECT id as Id, descricao as Descricao from categoria_cursos;";

            using (var con = CriarConexao())
            {
                try
                {
                    con.Open();
                    categoriaCursos = con.Query<CategoriaCurso>(sql).ToList();
                }
                catch (Exception ex)
                {
                    return null;
                }
                finally
                {
                    con.Close();
                }
            }

            return categoriaCursos;
        }
    }
}
