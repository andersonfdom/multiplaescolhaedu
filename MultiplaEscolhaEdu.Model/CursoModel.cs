using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace MultiplaEscolhaEdu.Model
{
    public class CursoModel
    {
        public int Id { get; set; }
        public string Descricao { get; set; }
        public string Valor { get; set; }
        public int? IdCategoriaCurso { get; set; }
        public string Slug { get; set; }
    }

    public class CursoConsulta
    {
        public int Id { get; set; }
        public string Descricao { get; set; }
        public string Valor { get; set; }
        public string CategoriaCurso { get; set; }
    }
}
