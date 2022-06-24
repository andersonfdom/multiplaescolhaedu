using System;
using System.Collections.Generic;

#nullable disable

namespace MultiplaEscolhaEdu.Dao.Models
{
    public partial class Aluno
    {
        public Aluno()
        {
            Matriculas = new HashSet<Matricula>();
        }

        public int Id { get; set; }
        public string Nome { get; set; }
        public DateTime? DataNascimento { get; set; }
        public string Rg { get; set; }
        public string Cpf { get; set; }
        public string Whatsapp { get; set; }
        public string Email { get; set; }
        public string Investimento { get; set; }
        public int MelhorDataPagamento { get; set; }
        public string Cep { get; set; }
        public string Logradouro { get; set; }
        public string Complemento { get; set; }
        public string Bairro { get; set; }
        public string Cidade { get; set; }
        public string Estado { get; set; }
        public DateTime? DataCadastro { get; set; }
        public DateTime UltimaAtualizacao { get; set; }
        public string SlugCurso { get; set; }
        public string SlugUnidade { get; set; }

        public virtual ICollection<Matricula> Matriculas { get; set; }
    }
}
