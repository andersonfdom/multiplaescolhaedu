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
    public class LogUsuarioDao : clsConexao
    {
        string sql = "";

        public bool Inserir(LogUsuario model)
        {
            sql += "INSERT INTO logusuarios (usuario,modulo,descricao,data_log,ip_log_usuarios)";
            sql += $" VALUES('{model.Usuario}','{model.Modulo}','{model.Descricao}',now(),'{model.IpLogUsuarios}');";

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
    }
}
