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
    public class ParametrosController : Controller
    {
        public IActionResult Index()
        {
            EmpresaDao empresaDao = new EmpresaDao();
            EmpresaModel empresaModel = empresaDao.CarregarDados();

            if (empresaModel == null)
                empresaModel = new EmpresaModel();

            return View(empresaModel);
        }

        [HttpPost]
        public IActionResult GravarEmpresa(EmpresaModel model)
        {
            EmpresaDao dao = new EmpresaDao();
            return Ok(dao.GravarDados(model));
        }
    }
}
