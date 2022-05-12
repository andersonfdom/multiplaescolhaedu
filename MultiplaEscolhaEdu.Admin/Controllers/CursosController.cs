﻿using Microsoft.AspNetCore.Mvc;
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
            return View();
        }

        public IActionResult Cadastro(int? id)
        {
            CategoriaCursoDao categoriaCursoDao = new CategoriaCursoDao();
            ViewBag.Categoria = categoriaCursoDao.Listar();
            CursoModel model = new CursoModel();
            return View(model);
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
    }
}
