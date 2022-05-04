using System;
using System.Collections.Generic;

#nullable disable

namespace MultiplaEscolhaEdu.Dao.Models
{
    public partial class Curso
    {
        public Curso()
        {
            Matriculas = new HashSet<Matricula>();
        }

        public int Id { get; set; }
        public string Descricao { get; set; }
        public decimal Valor { get; set; }
        public int? IdCategoriaCurso { get; set; }
        public DateTime? DataCadastro { get; set; }
        public DateTime? UltimaAtualizacao { get; set; }
        public string Slug { get; set; }

        public virtual CategoriaCurso IdCategoriaCursoNavigation { get; set; }
        public virtual ICollection<Matricula> Matriculas { get; set; }
    }
}
