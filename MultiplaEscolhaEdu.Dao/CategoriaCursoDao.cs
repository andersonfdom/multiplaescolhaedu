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
            return null;
        }
    }
}
