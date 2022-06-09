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
    public class HomeController : Controller
    {
     
        public IActionResult Index()
        {
            MatriculaDao dao = new MatriculaDao();

            ViewBag.QtdeMatriculas = dao.QtdeMatriculasRealizadas();
            ViewBag.QtdeAlunos = dao.QtdeAlunosCadastrados();
            ViewBag.QtdeParceiros = dao.QtdeParceirosCadastrados();
            ViewBag.QtdeCursos = dao.QtdeCursosCadastrados();

            return View();
        }

        [HttpPost]
        public IActionResult ValidarQtdeRegistrosMatricula()
        {
            MatriculaDao dao = new MatriculaDao();
            return Ok(new
            {
                qtdeCursos = dao.QtdeCursosCadastrados(),
                qtdeAlunos = dao.QtdeAlunosCadastrados(),
                qtdeParceiros = dao.QtdeParceirosCadastrados()
            });
        }
    }
}
