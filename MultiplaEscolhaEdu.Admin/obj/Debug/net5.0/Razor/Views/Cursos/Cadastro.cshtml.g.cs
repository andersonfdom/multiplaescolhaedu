#pragma checksum "D:\Projetos\multiplaescolhaedu\MultiplaEscolhaEdu.Admin\Views\Cursos\Cadastro.cshtml" "{ff1816ec-aa5e-4d10-87f7-6f4963833460}" "718899219be065d609b5bfce939701f5252595f7"
// <auto-generated/>
#pragma warning disable 1591
[assembly: global::Microsoft.AspNetCore.Razor.Hosting.RazorCompiledItemAttribute(typeof(AspNetCore.Views_Cursos_Cadastro), @"mvc.1.0.view", @"/Views/Cursos/Cadastro.cshtml")]
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
    [global::Microsoft.AspNetCore.Razor.Hosting.RazorSourceChecksumAttribute(@"SHA1", @"718899219be065d609b5bfce939701f5252595f7", @"/Views/Cursos/Cadastro.cshtml")]
    [global::Microsoft.AspNetCore.Razor.Hosting.RazorSourceChecksumAttribute(@"SHA1", @"b34a49b024ae6342944c23a1a4b2a7141541591e", @"/Views/_ViewImports.cshtml")]
    public class Views_Cursos_Cadastro : global::Microsoft.AspNetCore.Mvc.Razor.RazorPage<dynamic>
    {
        #pragma warning disable 1998
        public async override global::System.Threading.Tasks.Task ExecuteAsync()
        {
            WriteLiteral("\r\n");
#nullable restore
#line 2 "D:\Projetos\multiplaescolhaedu\MultiplaEscolhaEdu.Admin\Views\Cursos\Cadastro.cshtml"
  
    ViewData["Title"] = "Cadastro";

#line default
#line hidden
#nullable disable
            WriteLiteral(@"
<section class=""section"">
    <h1 class=""section-header"">
        Cadastro de Cursos
    </h1>
    <div class=""tab-content"" id=""myTabContent"">
        <div class=""tab-pane fade show active"" id=""dados-cadastrais"" role=""tabpanel"" aria-labelledby=""home-tab"">
            <div class=""table-responsive"" style=""overflow-x: auto"">
                <table class=""table"" style=""width: 100%"">
                    <tr>
                        <th>Categoria</th>
                        <th>
                            <div class=""modal fade"" id=""popCategoria"" role=""dialog"">
                                <div class=""modal-dialog"">
                                    <div class=""modal-content"">
                                        <div class=""modal-header"">
                                            <h4 class=""section-header"">
                                                Categoria dos Cursos
                                            </h4>
                                        </div>
           ");
            WriteLiteral(@"                             <div class=""modal-body"">
                                            <table class=""table"" style=""width: 100%"">
                                                <tr>
                                                    <th>Descrição</th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type=""text"" id=""txtDescricaoCategoria"" class=""form-control"" />
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class=""modal-footer"">
                                            <table class=""table"" style=""width: 100%"">
                                                <tr>
                                     ");
            WriteLiteral(@"               <td>
                                                        <input type=""button"" id=""btnSalvarCategoria"" value=""Salvar"" class=""btn btn-primary"" />
                                                        <input type=""button"" id=""btnCancelarCategoria"" value=""Cancelar"" class=""btn btn-danger"" onclick=""$('#popCategoria').modal('hide')"" />
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </th>
                    </tr>
                    <tr>
                        <td>
                            <select id=""ddlCategoria"" class=""form-control"">
                            </select>
                        </td>
                        <td>
                            <input type=""b");
            WriteLiteral(@"utton"" class=""btn btn-primary"" id=""btnCadastrar"" value=""Cadastrar"" data-toggle=""modal"" data-target=""#popCategoria"" data-backdrop="""" />
                        </td>
                    </tr>
                </table>
                <table class=""table"" style=""width: 100%"">
                    <tr>
                        <th>Descrição</th>
                        <th>Valor</th>
                    </tr>
                    <tr>
                        <td>
                            <input type=""hidden"" id=""hdnCursoId"" value=""0"" />
                            <input type=""text"" id=""txtDescricaoCurso"" class=""form-control"" />
                        </td>
                        <td>
                            <input type=""text"" id=""txtValorCurso"" class=""form-control moeda"" />
                        </td>
                    </tr>
                </table>
                <table class=""table"" style=""width: 100%"">
                    <tr>
                        <th>Slug</th>
            ");
            WriteLiteral(@"        </tr>
                    <tr>
                        <td>
                            <input type=""text"" id=""txtSlugCurso"" class=""form-control"" />
                        </td>
                    </tr>
                </table>
                <table class=""table"" style=""width: 100%"">
                    <tr>
                        <td>
                            <input type=""button"" id=""btnSalvarCurso"" value=""Salvar"" class=""btn btn-primary"" />
                            <input type=""button"" id=""btnCancelarCurso"" value=""Cancelar"" class=""btn btn-danger"" onclick=""window.location.href = '/Cursos/Index'"" />
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</section>

");
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
