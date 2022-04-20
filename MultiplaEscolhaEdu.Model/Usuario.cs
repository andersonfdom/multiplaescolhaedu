using System;

namespace MultiplaEscolhaEdu.Model
{
    public class Usuario
    {
        public int Id { get; set; }
        public string LoginUsuario { get; set; }

        public string Senha { get; set; }

        public int IdParceiro { get; set; }

        public int IdEmpresa { get; set; }

        public bool UsuarioLogado { get; set; }
    }
}
