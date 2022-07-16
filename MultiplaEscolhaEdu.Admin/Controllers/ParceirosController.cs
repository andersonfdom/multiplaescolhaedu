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
    public class ParceirosController : Controller
    {
        public IActionResult Index()
        {
            ParceiroDao ParceiroDao = new ParceiroDao();
            return View(ParceiroDao.ListarDados());
        }

        public IActionResult Cadastro(int? id)
        {
            return View();
        }

        [HttpPost]
        public IActionResult CarregarDados(int id)
        {
            ParceiroDao ParceiroDao = new ParceiroDao();
            var dados = ParceiroDao.CarregarDados(id);

            return Ok(new
            {
                mensagem = ParceiroDao.CarregarDados(id)
            });
        }

        [HttpPost]
        public IActionResult Gravar(ParceiroModel ParceiroModel)
        {
            ParceiroDao ParceiroDao = new ParceiroDao();

            return Ok(ParceiroDao.Gravar(ParceiroModel));
        }

        [HttpPost]
        public IActionResult ExcluirParceiros(int id)
        {
            ParceiroDao ParceiroDao = new ParceiroDao();

            return Ok(ParceiroDao.Excluir(id));
        }
    }
}
