using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace MultiplaEscolhaEdu.Model
{
    public class UsuarioModel
    {
        public int Id { get; set; }
        public string LoginUsuario { get; set; }
        public string Senha { get; set; }
        public int? IdParceiro { get; set; }
        public int? IdEmpresa { get; set; }
        public sbyte Usuariologado { get; set; }
    }
}
