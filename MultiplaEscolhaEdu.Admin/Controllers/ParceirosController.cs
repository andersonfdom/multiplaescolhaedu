using Microsoft.AspNetCore.Mvc;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace MultiplaEscolhaEdu.Admin.Controllers
{
    public class ParceirosController : Controller
    {
        public IActionResult Index()
        {
            return View();
        }

        public IActionResult Cadastro(int? id)
        {
            return View();
        }
    }
}
