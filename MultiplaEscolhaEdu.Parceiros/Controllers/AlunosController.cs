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
    public class AlunosController : Controller
    {

        public IActionResult Index()
        {
            AlunoDao alunoDao = new AlunoDao();
            return View(alunoDao.ListarDados());
        }

        public IActionResult Cadastro(int? id)
        {
            return View();
        }

        [HttpPost]
        public IActionResult CarregarDados(int id)
        {
            AlunoDao alunoDao = new AlunoDao();
            var dados = alunoDao.CarregarDados(id);

            ViewBag.DataNascimento = Convert.ToDateTime(dados.DataNascimento).ToShortDateString();

            return Ok(new
            {
                mensagem = alunoDao.CarregarDados(id)
            });
        }

        [HttpPost]
        public IActionResult Gravar(AlunoModel alunoModel)
        {
            AlunoDao alunoDao = new AlunoDao();

            return Ok(new
            {
                mensagem = alunoDao.Gravar(alunoModel)
            });
        }

        [HttpPost]
        public IActionResult ExcluirAlunos(int id)
        {
            AlunoDao alunoDao = new AlunoDao();

            return Ok(new
            {
                mensagem = alunoDao.Excluir(id)
            });
        }
    }
}
