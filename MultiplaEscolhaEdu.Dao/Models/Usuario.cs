using System;
using System.Collections.Generic;

#nullable disable

namespace MultiplaEscolhaEdu.Dao.Models
{
    public partial class Usuario
    {
        public Usuario()
        {
            Logusuarios = new HashSet<Logusuario>();
        }

        public int Id { get; set; }
        public string LoginUsuario { get; set; }
        public string Senha { get; set; }
        public sbyte Ativo { get; set; }
        public DateTime DataCadastro { get; set; }
        public DateTime? UltimoAcesso { get; set; }
        public int? IdParceiro { get; set; }
        public int? IdEmpresa { get; set; }
        public sbyte Usuariologado { get; set; }
        public string SecretKey { get; set; }

        public virtual ICollection<Logusuario> Logusuarios { get; set; }
    }
}
