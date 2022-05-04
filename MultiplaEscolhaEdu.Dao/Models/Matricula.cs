using System;
using System.Collections.Generic;

#nullable disable

namespace MultiplaEscolhaEdu.Dao.Models
{
    public partial class Matricula
    {
        public int Id { get; set; }
        public int IdAluno { get; set; }
        public int? IdCurso { get; set; }
        public int? IdParceiro { get; set; }
        public sbyte? Status { get; set; }
        public DateTime? DataMatricula { get; set; }

        public virtual Aluno IdAlunoNavigation { get; set; }
        public virtual Curso IdCursoNavigation { get; set; }
    }
}
