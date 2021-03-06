using Microsoft.AspNetCore.Mvc;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using MultiplaEscolhaEdu.Model;
using MultiplaEscolhaEdu.Dao;
using MultiplaEscolhaEdu.Dao.Models;

namespace MultiplaEscolhaEdu.Admin.Controllers
{
    public class UsuariosController : Controller
    {
        public IActionResult Index()
        {
            UsuarioDao dao = new UsuarioDao();
            return View(dao.ListarUsuariosAdmin());
        }

        public IActionResult Cadastro(int? id)
        {
            var idUsuario = id == null ? 0 : Convert.ToInt32(id);
            UsuarioModel model = null;

            if (idUsuario == 0)
            {
                model = new UsuarioModel();
            }
            else
            {
                UsuarioDao dao = new UsuarioDao();
                model = dao.CarregarDados(idUsuario);
            }

            return View(model);
        }

        [HttpPost]
        public IActionResult ExcluirUsuario(int wId)
        {
            UsuarioDao dao = new UsuarioDao();

            return Ok(dao.Excluir(wId));
        }

        [HttpPost]
        public IActionResult GravarUsuario(UsuarioModel model)
        {
            UsuarioDao dao = new UsuarioDao();

            return Ok(dao.Gravar(model));
        }
    }
}
