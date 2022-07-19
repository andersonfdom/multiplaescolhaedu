using MultiplaEscolhaEdu.Model;
using System;

namespace MultiplaEscolhaEdu.Dao
{
    class Program
    {
        static void Main(string[] args)
        {
            UsuarioDao dao = new UsuarioDao();
            var senha = dao.GerarNovaSenha();

            Console.WriteLine(senha);
            Console.ReadKey();
        }
    }
}
