using System;
using MultiplaEscolhaEdu.Model;

namespace MultiplaEscolhaEdu.Dao
{
    class Program
    {
        static void Main(string[] args)
        {
            UsuarioDao usuarioDao = new UsuarioDao();
            Console.WriteLine(usuarioDao.RealizarLogin("multiplaescolhaeducacional@gmail.com", "0"));
            Console.ReadKey();
        }
    }
}
