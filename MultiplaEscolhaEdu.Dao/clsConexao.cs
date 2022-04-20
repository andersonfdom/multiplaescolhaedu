using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using MySql.Data;
using MySql.Data.MySqlClient;

namespace MultiplaEscolhaEdu.Dao
{
    public abstract class clsConexao
    {
        protected MySqlConnection CriarConexao()
        {
            return new MySqlConnection
            {
                ConnectionString = "Server=andersondomingos.eti.br;Database=multiplaescolhaedu;User Id=multiplaescolhaedu;Password=oz0xQ0$2;"
            };
        }
    }
}
