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
    public class CursosController : Controller
    {
        public IActionResult Index()
        {
            CursoDao dao = new CursoDao();
            return View(dao.ListarDados());
        }

        public IActionResult Cadastro(int? id)
        {
            CategoriaCursoDao categoriaCursoDao = new CategoriaCursoDao();
            ViewBag.Categoria = categoriaCursoDao.Listar();            
            return View();
        }

        [HttpPost]
        public IActionResult GravarCategoria(CategoriaCursoModel model)
        {
            CategoriaCursoDao categoriaCursoDao = new CategoriaCursoDao();
            return Ok(new
            {
                Id = categoriaCursoDao.Gravar(model)
            });
        }

        [HttpGet]
        public IActionResult CarregarDadosCurso(int id)
        {
            CursoDao dao = new CursoDao();
            return Ok(new {
                dados = dao.CarregarDados(id)
            });
        }

        [HttpPost]
        public IActionResult GravarCurso(CursoModel model)
        {
            CursoDao dao = new CursoDao();
            return Ok(new
            {
                mensagem = dao.Gravar(model)
            });
        }

        [HttpPost]
        public IActionResult ExcluirCursos(int id)
        {
            CursoDao dao = new CursoDao();
            return Ok(new
            {
                mensagem = dao.Excluir(id)
            }); 
        }
    }
}
