using System;
using System.Collections.Generic;

#nullable disable

namespace MultiplaEscolhaEdu.Dao.Models
{
    public partial class Logusuario
    {
        public int Id { get; set; }
        public string Descricao { get; set; }
        public DateTime DataLog { get; set; }
        public string IpLogUsuarios { get; set; }
        public int IdUsuario { get; set; }

        public virtual Usuario IdUsuarioNavigation { get; set; }
    }
}
