using MultiplaEscolhaEdu.Model;
using System;

namespace MultiplaEscolhaEdu.Dao
{
    class Program
    {
        static void Main(string[] args)
        {
            UsuarioDao dao = new UsuarioDao();
            UsuarioModel model = dao.CarregarDados(1);

            dao.Gravar(model);

            Console.WriteLine(model.Senha);
            Console.ReadKey();
        }
    }
}
