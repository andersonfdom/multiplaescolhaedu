using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace MultiplaEscolhaEdu.Model
{
    public class LogUsuario
    {
        public int Id { get; set; }

        public string Usuario { get; set; }

        public string Modulo { get; set; }

        public string Descricao { get; set; }

        public DateTime? DataLog { get; set; }

        public string IpLogUsuarios { get; set; }
    }
}
