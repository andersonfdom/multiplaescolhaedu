#pragma checksum "D:\Projetos\multiplaescolhaedu\MultiplaEscolhaEdu.Admin\Views\Cursos\Cadastro.cshtml" "{ff1816ec-aa5e-4d10-87f7-6f4963833460}" "84c6eb9ae45d37d2b307175ffb7f5e9c422883ff"
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
    [global::Microsoft.AspNetCore.Razor.Hosting.RazorSourceChecksumAttribute(@"SHA1", @"84c6eb9ae45d37d2b307175ffb7f5e9c422883ff", @"/Views/Cursos/Cadastro.cshtml")]
    [global::Microsoft.AspNetCore.Razor.Hosting.RazorSourceChecksumAttribute(@"SHA1", @"b34a49b024ae6342944c23a1a4b2a7141541591e", @"/Views/_ViewImports.cshtml")]
    public class Views_Cursos_Cadastro : global::Microsoft.AspNetCore.Mvc.Razor.RazorPage<dynamic>
    {
        #line hidden
        #pragma warning disable 0649
        private global::Microsoft.AspNetCore.Razor.Runtime.TagHelpers.TagHelperExecutionContext __tagHelperExecutionContext;
        #pragma warning restore 0649
        private global::Microsoft.AspNetCore.Razor.Runtime.TagHelpers.TagHelperRunner __tagHelperRunner = new global::Microsoft.AspNetCore.Razor.Runtime.TagHelpers.TagHelperRunner();
        #pragma warning disable 0169
        private string __tagHelperStringValueBuffer;
        #pragma warning restore 0169
        private global::Microsoft.AspNetCore.Razor.Runtime.TagHelpers.TagHelperScopeManager __backed__tagHelperScopeManager = null;
        private global::Microsoft.AspNetCore.Razor.Runtime.TagHelpers.TagHelperScopeManager __tagHelperScopeManager
        {
            get
            {
                if (__backed__tagHelperScopeManager == null)
                {
                    __backed__tagHelperScopeManager = new global::Microsoft.AspNetCore.Razor.Runtime.TagHelpers.TagHelperScopeManager(StartTagHelperWritingScope, EndTagHelperWritingScope);
                }
                return __backed__tagHelperScopeManager;
            }
        }
        private global::Microsoft.AspNetCore.Mvc.TagHelpers.OptionTagHelper __Microsoft_AspNetCore_Mvc_TagHelpers_OptionTagHelper;
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
            WriteLiteral(@"<script>
    $(function () {
        var id = getParameterByName(""id"") == null ? ""0"" : getParameterByName(""id"");

        if (id !== ""0"") {
            $('#hdnCursoId').val(id);

            $.ajax({
                type: ""GET"",
                url: ""/Cursos/CarregarDadosCurso?id="" + $('#hdnCursoId').val(),
                contentType:""application/JSON; charset=UTF-8"",
                dataType: ""json"",
                success: function (jsonResult) {
                    $(jsonResult.dados).each(function () {
                        $('#txtDescricaoCurso').val(this.descricao);
                        $('#ddlCategoria').val(this.idCategoriaCurso);
                        $('#txtSlugCurso').val(this.slug);
                        $('#txtValorCurso').val(this.valor);
                    });
                }
            });
        }

        $('#btnSalvarCategoria').click(function () {
            if (document.getElementById('txtDescricaoCategoria').value === '') {
                alert(");
            WriteLiteral(@"'Campo obrigat??rio n??o preenchido: Descri????o');
                document.getElementById('txtDescricaoCategoria').focus();
                return false;
            }

            var data = new FormData();

            data.append(""Id"", '0');
            data.append(""Descricao"", $('#txtDescricaoCategoria').val());

            $.ajax({
                url: ""/Cursos/GravarCategoria"",
                data: data,
                processData: false,
                contentType: false,
                type: ""POST"",
                success: function (data) {
                    if (data.Id !== ""0"" || data.Id > 0) {
                        window.location.reload(true);
                    } else {
                        alert(data.mensagem);
                    }
                },
                error: function (request, status, error) {
                    alert(request.responseText);
                }
            });
        });

        $('#btnSalvarCurso').click(function () {
   ");
            WriteLiteral(@"         if (document.getElementById('txtDescricaoCurso').value === '') {
                alert('Campo obrigat??rio n??o preenchido: Descri????o');
                document.getElementById('txtDescricaoCurso').focus();
                return false;
            }

            if (document.getElementById('txtValorCurso').value === '') {
                alert('Campo obrigat??rio n??o preenchido: Valor');
                document.getElementById('txtValorCurso').focus();
                return false;
            }

            if (document.getElementById('txtSlugCurso').value === '') {
                alert('Campo obrigat??rio n??o preenchido: Slug');
                document.getElementById('txtSlugCurso').focus();
                return false;
            }

            var data = new FormData();

            data.append(""Id"", $('#hdnCursoId').val());
            data.append(""Descricao"", $('#txtDescricaoCurso').val());
            data.append(""Valor"", $('#txtValorCurso').val());
            data.app");
            WriteLiteral(@"end(""IdCategoriaCurso"", $('#ddlCategoria').val());
            data.append(""Slug"", $('#txtSlugCurso').val());

            $.ajax({
                url: ""/Cursos/GravarCurso"",
                data: data,
                processData: false,
                contentType: false,
                type: ""POST"",
                success: function (jsonResult) {
                    if (jsonResult.sucesso === true) {
                        $('#popMensagemSucesso').modal('show');
                        $('#mensagemSucesso').html(jsonResult.mensagem);
                        window.setTimeout(function () {
                            window.location.href = ""/Cursos/Index""
                        }, 3000);
                    } else {
                        $('#popMensagemErro').modal('show');
                        $('#mensagemErro').html(jsonResult.mensagem);
                        window.setTimeout(function () {
                            $('#popMensagemErro').modal('hide');
                  ");
            WriteLiteral(@"      }, 5000);
                    }
                }
            });
        });
    });

    function getParameterByName(name, url = window.location.href) {
        name = name.replace(/[\[\]]/g, '\\$&');
        var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
            results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, ' '));
    }
</script>
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
                            <div class=""modal f");
            WriteLiteral(@"ade"" id=""popCategoria"" role=""dialog"">
                                <div class=""modal-dialog"">
                                    <div class=""modal-content"">
                                        <div class=""modal-header"">
                                            <h4 class=""section-header"">
                                                Categoria dos Cursos
                                            </h4>
                                        </div>
                                        <div class=""modal-body"">
                                            <table class=""table"" style=""width: 100%"">
                                                <tr>
                                                    <th>Descri????o</th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type=""text"" id=""txtDescricaoCategoria"" cl");
            WriteLiteral(@"ass=""form-control"" />
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class=""modal-footer"">
                                            <table class=""table"" style=""width: 100%"">
                                                <tr>
                                                    <td>
                                                        <input type=""button"" id=""btnSalvarCategoria"" value=""Salvar"" class=""btn btn-primary"" />
                                                        <input type=""button"" id=""btnCancelarCategoria"" value=""Cancelar"" class=""btn btn-danger"" onclick=""$('#popCategoria').modal('hide')"" />
                                                    </td>
                                                </tr>
                                            </table>
                ");
            WriteLiteral(@"                        </div>
                                    </div>
                                </div>
                            </div>
                        </th>
                    </tr>
                    <tr>
                        <td>
                            <select id=""ddlCategoria"" class=""form-control"">
");
#nullable restore
#line 169 "D:\Projetos\multiplaescolhaedu\MultiplaEscolhaEdu.Admin\Views\Cursos\Cadastro.cshtml"
                                 foreach (var item in ViewBag.Categoria)
                                {

#line default
#line hidden
#nullable disable
            WriteLiteral("                                    ");
            __tagHelperExecutionContext = __tagHelperScopeManager.Begin("option", global::Microsoft.AspNetCore.Razor.TagHelpers.TagMode.StartTagAndEndTag, "84c6eb9ae45d37d2b307175ffb7f5e9c422883ff11556", async() => {
#nullable restore
#line 171 "D:\Projetos\multiplaescolhaedu\MultiplaEscolhaEdu.Admin\Views\Cursos\Cadastro.cshtml"
                                                        Write(item.Descricao);

#line default
#line hidden
#nullable disable
            }
            );
            __Microsoft_AspNetCore_Mvc_TagHelpers_OptionTagHelper = CreateTagHelper<global::Microsoft.AspNetCore.Mvc.TagHelpers.OptionTagHelper>();
            __tagHelperExecutionContext.Add(__Microsoft_AspNetCore_Mvc_TagHelpers_OptionTagHelper);
            BeginWriteTagHelperAttribute();
#nullable restore
#line 171 "D:\Projetos\multiplaescolhaedu\MultiplaEscolhaEdu.Admin\Views\Cursos\Cadastro.cshtml"
                                       WriteLiteral(item.Id);

#line default
#line hidden
#nullable disable
            __tagHelperStringValueBuffer = EndWriteTagHelperAttribute();
            __Microsoft_AspNetCore_Mvc_TagHelpers_OptionTagHelper.Value = __tagHelperStringValueBuffer;
            __tagHelperExecutionContext.AddTagHelperAttribute("value", __Microsoft_AspNetCore_Mvc_TagHelpers_OptionTagHelper.Value, global::Microsoft.AspNetCore.Razor.TagHelpers.HtmlAttributeValueStyle.DoubleQuotes);
            await __tagHelperRunner.RunAsync(__tagHelperExecutionContext);
            if (!__tagHelperExecutionContext.Output.IsContentModified)
            {
                await __tagHelperExecutionContext.SetOutputContentAsync();
            }
            Write(__tagHelperExecutionContext.Output);
            __tagHelperExecutionContext = __tagHelperScopeManager.End();
            WriteLiteral("\r\n");
#nullable restore
#line 172 "D:\Projetos\multiplaescolhaedu\MultiplaEscolhaEdu.Admin\Views\Cursos\Cadastro.cshtml"
                                }

#line default
#line hidden
#nullable disable
            WriteLiteral(@"                            </select>
                        </td>
                        <td>
                            <input type=""button"" class=""btn btn-primary"" id=""btnCadastrar"" value=""Cadastrar"" data-toggle=""modal"" data-target=""#popCategoria"" data-backdrop="""" />
                        </td>
                    </tr>
                </table>
                <table class=""table"" style=""width: 100%"">
                    <tr>
                        <th>Descri????o</th>
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
                </ta");
            WriteLiteral(@"ble>
                <table class=""table"" style=""width: 100%"">
                    <tr>
                        <th>Slug</th>
                    </tr>
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
