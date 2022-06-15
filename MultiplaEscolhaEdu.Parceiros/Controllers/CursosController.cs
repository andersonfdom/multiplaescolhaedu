using Microsoft.AspNetCore.Mvc;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using MultiplaEscolhaEdu.Model;
using MultiplaEscolhaEdu.Dao;
using MultiplaEscolhaEdu.Dao.Models;

namespace MultiplaEscolhaEdu.Parceiros.Controllers
{
    public class CursosController : Controller
    {
        public IActionResult Index()
        {
            CursoDao dao = new CursoDao();
            return View(dao.ListarDados());
        }

        public IActionResult Consulta(int? id)
        {
            CategoriaCursoDao categoriaCursoDao = new CategoriaCursoDao();
            ViewBag.Categoria = categoriaCursoDao.Listar();
            return View();
        }
    }
}
