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
    public class MatriculasController : Controller
    {
        public IActionResult Index()
        {
            return View();
        }

        public IActionResult Cadastro(int? id)
        {
            CursoDao cursoDao = new CursoDao();
            ViewBag.Cursos = cursoDao.ListarDados();

            AlunoDao alunoDao = new AlunoDao();
            ViewBag.Alunos = alunoDao.ListarDados();

            ParceiroDao parceiroDao = new ParceiroDao();
            ViewBag.Parceiros = parceiroDao.ListarDados();

            return View();
        }

        [HttpGet]
        public IActionResult CarregarDadosMatricula(int id)
        {
            MatriculaDao dao = new MatriculaDao();
            
            return Ok(new
            {
                mensagem = dao.CarregarDados(id)
            });
        }

        [HttpPost]
        public IActionResult ExcluirMatriculas(int id)
        {
            MatriculaDao dao = new MatriculaDao();
            return Ok(new
            {
                mensagem = dao.Excluir(id)
            });
        }

        [HttpPost]
        public IActionResult GravarMatricula(MatriculaModel model)
        {
            MatriculaDao MatriculaDao = new MatriculaDao();

            return Ok(new
            {
                mensagem = MatriculaDao.Gravar(model)
            });
        }
    }
}
