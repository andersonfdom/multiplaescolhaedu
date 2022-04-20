using Microsoft.AspNetCore.Mvc;
using Microsoft.Extensions.Logging;
using MultiplaEscolhaEdu.Model;
using MultiplaEscolhaEdu.Dao;
using System;
using System.Collections.Generic;
using System.Diagnostics;
using System.Linq;
using System.Threading.Tasks;
using Microsoft.AspNetCore.Http;
using System.Net;

namespace MultiplaEscolhaEdu.Admin.Controllers
{
    public class HomeController : Controller
    {
        public IActionResult Index()
        {
            return View();
        }

        public IActionResult Login()
        {
            return View();
        }

        public IActionResult Logar([FromBody] Usuario usuario)
        {
            UsuarioDao usuarioDao = new UsuarioDao();
            var dadosUsuario = usuarioDao.RealizarLogin(usuario.LoginUsuario,usuario.Senha);

            if (dadosUsuario != null)
            {
                HttpContext.Session.SetString("usuarioId", dadosUsuario.Id.ToString());
                HttpContext.Session.SetString("empresaId", dadosUsuario.IdEmpresa.ToString());
                
                var ip = new WebClient().DownloadString("https://api.ipify.org");

                LogUsuarioDao logUsuarioDao = new LogUsuarioDao();
                LogUsuario logUsuario = new LogUsuario
                {
                    DataLog = DateTime.Now,
                    Descricao = "Realizou login",
                    Id = 0,
                    Modulo = "Admin",
                    IpLogUsuarios = $"{ip}",
                    Usuario = usuario.LoginUsuario
                };

                logUsuarioDao.Inserir(logUsuario);

                return Ok(new
                {
                    sucesso = true,
                    mensagem = "Login efetuado com sucesso! Aguarde..."
                });
            }
            else
            {
                return Ok(new
                {
                    sucesso = false,
                    mensagem = "Usuário e/ou Senha inválidos"
                });
            }
        }
    }
}
