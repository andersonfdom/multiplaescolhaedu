using System;
using System.Collections;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace MultiplaEscolhaEdu.Dao
{
    public interface IDao<T>
    {
        string Gravar(T model);

        string Excluir(int id);

        T CarregarDados(int id);

        List<T> ListarDados();
    }
}
