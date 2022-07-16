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
            MatriculaDao dao = new MatriculaDao();
            return View(dao.ListarMatriculas());
        }

        public IActionResult Cadastro(int? id)
        {
            return View();
        }

        [HttpGet]
        public IActionResult CarregarDadosMatricula(int id)
        {
            MatriculaDao dao = new MatriculaDao();
            
            return Ok(dao.CarregarDados(id));
        }

        [HttpPost]
        public IActionResult ExcluirMatriculas(int id)
        {
            MatriculaDao dao = new MatriculaDao();
            return Ok(dao.Excluir(id));
        }

        [HttpPost]
        public IActionResult GravarMatricula(MatriculaModel model)
        {
            MatriculaDao MatriculaDao = new MatriculaDao();

            return Ok(MatriculaDao.Gravar(model));
        }

        [HttpGet]
        public IActionResult ListarCursos()
        {
            CursoDao cursoDao = new CursoDao();
            return Ok(cursoDao.ListarDados());
        }

        [HttpGet]
        public IActionResult ListarAlunos()
        {
            AlunoDao alunoDao = new AlunoDao();
            return Ok(alunoDao.ListarDados());
        }

        [HttpGet]
        public IActionResult ListarParceiros()
        {
            ParceiroDao parceiroDao = new ParceiroDao();
            return Ok(parceiroDao.ListarDados());
        }
    }
}
