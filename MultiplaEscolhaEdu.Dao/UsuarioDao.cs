using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using Dapper;
using MySql.Data;
using MySql.Data.MySqlClient;
using MultiplaEscolhaEdu.Model;

namespace MultiplaEscolhaEdu.Dao
{
    public class UsuarioDao : clsConexao
    {
        string sql = "";

        public Usuario RealizarLogin(string usuario, string senha)
        {
            sql += $"SELECT id AS Id, login_usuario AS LoginUsuario, senha AS Senha, id_parceiro AS IdParceiro,";
            sql += $" id_empresa AS IdEmpresa, usuariologado AS UsuarioLogado";
            sql += $" FROM usuarios WHERE login_usuario = '{usuario}' AND senha = '{senha}'";

            Usuario model = null;

            using (var con = CriarConexao())
            {
                try
                {
                    con.Open();
                    model = con.Query<Usuario>(sql).FirstOrDefault();
                }
                catch (Exception ex)
                {
                    throw ex;
                }
                finally
                {
                    con.Close();
                }

                return model;
            }
        }
    }
}
