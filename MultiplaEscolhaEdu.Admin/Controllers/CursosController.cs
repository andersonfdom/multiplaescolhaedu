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
    public class CursosController : Controller
    {
        public IActionResult Index()
        {
            return View();
        }

        public IActionResult Cadastro(int? id)
        {
            return View();
        }

        [HttpGet]
        public IActionResult ListarCategoriaCursos()
        {
            CategoriaCursoDao categoriaCursoDao = new CategoriaCursoDao();
            return Ok(new
            {
                sucesso = true,
                mensagem = categoriaCursoDao.Listar()
            });
        }
    }
}
