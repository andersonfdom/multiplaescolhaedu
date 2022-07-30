using Microsoft.AspNetCore.Mvc;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using MultiplaEscolhaEdu.Model;
using MultiplaEscolhaEdu.Dao;
using MultiplaEscolhaEdu.Dao.Models;
using Microsoft.AspNetCore.Http;

namespace MultiplaEscolhaEdu.Admin.Controllers
{
    public class LoginController : Controller
    {
        public IActionResult Index()
        {
            return View();
        }

        public IActionResult EsqueceuASenha()
        {
            return View();
        }

        public IActionResult RecuperarSenha(string code)
        {
            return View();
        }

        [HttpPost]
        public IActionResult RealizarLogin(Dictionary<string,string>wDados)
        {
            UsuarioDao dao = new UsuarioDao();
            var model = dao.RealizarLoginAdmin(wDados["login"].ToString(), wDados["senha"].ToString());

            if (model == null)
            {
                return Ok(new
                {
                    sucesso = false,
                    mensagem = "Usuário e/ou senha inválidos."
               });
            }
            else
            {
                HttpContext.Session.SetString("usuarioId", model.Id.ToString());
                HttpContext.Session.SetString("empresaId", model.IdEmpresa.ToString());

                return Ok(new
                {
                    sucesso = true,
                    mensagem = "Login realizado com sucesso! Aguarde..."
                });
            }
        }

        [HttpPost]
        public IActionResult RealizarLogoff(int idUsuario)
        {
            UsuarioDao dao = new UsuarioDao();
            return Ok(new
            {
                mensagem = dao.RealizarLogoffAdmin(idUsuario)
            });
        }

        [HttpPost]
        public IActionResult EnviarEmailSenha(string email,string url)
        {
            UsuarioDao dao = new UsuarioDao();
            return Ok(dao.RetornarDadosRecuperacaoSenhaAdmin(email,url));
        }

        [HttpGet]
        public IActionResult ValidarToken(string code)
        {
            UsuarioDao dao = new UsuarioDao();
            return Ok(dao.TokenValido(code));
        }

        [HttpPost]
        public IActionResult AlterarSenha(Dictionary<string, string> wDados)
        {
            UsuarioDao dao = new UsuarioDao();
            return Ok(dao.AlterarSenha(wDados));
        }
    }
}
