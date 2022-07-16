using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace MultiplaEscolhaEdu.Model
{
    public class MatriculaModel
    {
        public int Id { get; set; }
        public int IdAluno { get; set; }
        public int? IdCurso { get; set; }
        public int? IdParceiro { get; set; }
        public string DataMatricula { get; set; }
    }

    public class MatriculaConsulta
    {
        public int Id { get; set; }
        public string NomeAluno { get; set; }
        public string NomeCurso { get; set; }
        public string NomeParceiro { get; set; }
        public string StatusMatricula { get; set; }
        public string DataMatricula { get; set; }
    }
}
