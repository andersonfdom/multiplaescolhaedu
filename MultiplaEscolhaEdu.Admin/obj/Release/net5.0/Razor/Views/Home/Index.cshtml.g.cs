#pragma checksum "D:\Projetos\multiplaescolhaedu\MultiplaEscolhaEdu.Admin\Views\Home\Index.cshtml" "{ff1816ec-aa5e-4d10-87f7-6f4963833460}" "2b3444ed6d920a353687cd9c112dfa6bc63a4b1e"
// <auto-generated/>
#pragma warning disable 1591
[assembly: global::Microsoft.AspNetCore.Razor.Hosting.RazorCompiledItemAttribute(typeof(AspNetCore.Views_Home_Index), @"mvc.1.0.view", @"/Views/Home/Index.cshtml")]
namespace AspNetCore
{
    #line hidden
    using System;
    using System.Collections.Generic;
    using System.Linq;
    using System.Threading.Tasks;
    using Microsoft.AspNetCore.Mvc;
    using Microsoft.AspNetCore.Mvc.Rendering;
    using Microsoft.AspNetCore.Mvc.ViewFeatures;
#nullable restore
#line 1 "D:\Projetos\multiplaescolhaedu\MultiplaEscolhaEdu.Admin\Views\_ViewImports.cshtml"
using MultiplaEscolhaEdu.Admin;

#line default
#line hidden
#nullable disable
#nullable restore
#line 2 "D:\Projetos\multiplaescolhaedu\MultiplaEscolhaEdu.Admin\Views\_ViewImports.cshtml"
using MultiplaEscolhaEdu.Admin.Models;

#line default
#line hidden
#nullable disable
    [global::Microsoft.AspNetCore.Razor.Hosting.RazorSourceChecksumAttribute(@"SHA1", @"2b3444ed6d920a353687cd9c112dfa6bc63a4b1e", @"/Views/Home/Index.cshtml")]
    [global::Microsoft.AspNetCore.Razor.Hosting.RazorSourceChecksumAttribute(@"SHA1", @"b34a49b024ae6342944c23a1a4b2a7141541591e", @"/Views/_ViewImports.cshtml")]
    public class Views_Home_Index : global::Microsoft.AspNetCore.Mvc.Razor.RazorPage<dynamic>
    {
        #pragma warning disable 1998
        public async override global::System.Threading.Tasks.Task ExecuteAsync()
        {
#nullable restore
#line 1 "D:\Projetos\multiplaescolhaedu\MultiplaEscolhaEdu.Admin\Views\Home\Index.cshtml"
  
    ViewData["Title"] = "Home Page";

#line default
#line hidden
#nullable disable
            WriteLiteral(@"<h1 class=""section-header"">
    Dashboard
</h1>
<div class=""row"">
    <div class=""col-lg-3 col-md-6 col-12"">
        <div class=""card card-sm-3"">
            <div class=""card-icon bg-primary"">
                <i class=""ion ion-person""></i>
            </div>
            <div class=""card-wrap"">
                <div class=""card-header"">
                    <h4>Cursos Cadastrados</h4>
                </div>
                <div id=""dvQuantidadeCursos"" class=""card-body"">
                    <a href=""/Cursos/Index"">");
#nullable restore
#line 18 "D:\Projetos\multiplaescolhaedu\MultiplaEscolhaEdu.Admin\Views\Home\Index.cshtml"
                                       Write(ViewBag.QtdeCursos);

#line default
#line hidden
#nullable disable
            WriteLiteral(@"</a>
                </div>
            </div>
        </div>
    </div>
    <div class=""col-lg-3 col-md-6 col-12"">
        <div class=""card card-sm-3"">
            <div class=""card-icon bg-danger"">
                <i class=""ion ion-ios-paper-outline""></i>
            </div>
            <div class=""card-wrap"">
                <div class=""card-header"">
                    <h4>Alunos Cadastrados</h4>
                </div>
                <div id=""dvQuantidadeAlunos"" class=""card-body"">
                    <a href=""/Alunos/Index"">");
#nullable restore
#line 33 "D:\Projetos\multiplaescolhaedu\MultiplaEscolhaEdu.Admin\Views\Home\Index.cshtml"
                                       Write(ViewBag.QtdeAlunos);

#line default
#line hidden
#nullable disable
            WriteLiteral(@"</a>
                </div>
            </div>
        </div>
    </div>
    <div class=""col-lg-3 col-md-6 col-12"">
        <div class=""card card-sm-3"">
            <div class=""card-icon bg-warning"">
                <i class=""ion ion-paper-airplane""></i>
            </div>
            <div class=""card-wrap"">
                <div class=""card-header"">
                    <h4>Parceiros Cadastrados</h4>
                </div>
                <div id=""dvQuantidadeParceiros"" class=""card-body"">
                     <a href=""/Parceiros/Index"">");
#nullable restore
#line 48 "D:\Projetos\multiplaescolhaedu\MultiplaEscolhaEdu.Admin\Views\Home\Index.cshtml"
                                           Write(ViewBag.QtdeParceiros);

#line default
#line hidden
#nullable disable
            WriteLiteral(@"</a>
                </div>
            </div>
        </div>
    </div>
    <div class=""col-lg-3 col-md-6 col-12"">
        <div class=""card card-sm-3"">
            <div class=""card-icon bg-secondary"">
                <i class=""ion ion-paper-airplane""></i>
            </div>
            <div class=""card-wrap"">
                <div class=""card-header"">
                    <h4>Matrículas Realizadas</h4>
                </div>
                <div id=""dvQuantidadeParceiros"" class=""card-body"">
                     <a href=""/Matriculas/Index"">");
#nullable restore
#line 63 "D:\Projetos\multiplaescolhaedu\MultiplaEscolhaEdu.Admin\Views\Home\Index.cshtml"
                                            Write(ViewBag.QtdeMatriculas);

#line default
#line hidden
#nullable disable
            WriteLiteral("</a>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </div>\r\n</div>\r\n");
        }
        #pragma warning restore 1998
        [global::Microsoft.AspNetCore.Mvc.Razor.Internal.RazorInjectAttribute]
        public global::Microsoft.AspNetCore.Mvc.ViewFeatures.IModelExpressionProvider ModelExpressionProvider { get; private set; }
        [global::Microsoft.AspNetCore.Mvc.Razor.Internal.RazorInjectAttribute]
        public global::Microsoft.AspNetCore.Mvc.IUrlHelper Url { get; private set; }
        [global::Microsoft.AspNetCore.Mvc.Razor.Internal.RazorInjectAttribute]
        public global::Microsoft.AspNetCore.Mvc.IViewComponentHelper Component { get; private set; }
        [global::Microsoft.AspNetCore.Mvc.Razor.Internal.RazorInjectAttribute]
        public global::Microsoft.AspNetCore.Mvc.Rendering.IJsonHelper Json { get; private set; }
        [global::Microsoft.AspNetCore.Mvc.Razor.Internal.RazorInjectAttribute]
        public global::Microsoft.AspNetCore.Mvc.Rendering.IHtmlHelper<dynamic> Html { get; private set; }
    }
}
#pragma warning restore 1591
