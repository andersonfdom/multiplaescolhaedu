using System;
using System.Collections.Generic;

#nullable disable

namespace MultiplaEscolhaEdu.Dao.Models
{
    public partial class CategoriaCurso
    {
        public CategoriaCurso()
        {
            Cursos = new HashSet<Curso>();
        }

        public int Id { get; set; }
        public string Descricao { get; set; }
        public DateTime? DataCadastro { get; set; }
        public DateTime UltimaAtualizacao { get; set; }

        public virtual ICollection<Curso> Cursos { get; set; }
    }
}
