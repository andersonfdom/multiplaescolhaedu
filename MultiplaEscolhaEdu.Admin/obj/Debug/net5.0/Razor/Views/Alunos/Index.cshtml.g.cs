#pragma checksum "D:\Projetos\multiplaescolhaedu\MultiplaEscolhaEdu.Admin\Views\Alunos\Index.cshtml" "{ff1816ec-aa5e-4d10-87f7-6f4963833460}" "311dc20bd3a764229ceb915a01274ab6a8d7b1d4"
// <auto-generated/>
#pragma warning disable 1591
[assembly: global::Microsoft.AspNetCore.Razor.Hosting.RazorCompiledItemAttribute(typeof(AspNetCore.Views_Alunos_Index), @"mvc.1.0.view", @"/Views/Alunos/Index.cshtml")]
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
    [global::Microsoft.AspNetCore.Razor.Hosting.RazorSourceChecksumAttribute(@"SHA1", @"311dc20bd3a764229ceb915a01274ab6a8d7b1d4", @"/Views/Alunos/Index.cshtml")]
    [global::Microsoft.AspNetCore.Razor.Hosting.RazorSourceChecksumAttribute(@"SHA1", @"b34a49b024ae6342944c23a1a4b2a7141541591e", @"/Views/_ViewImports.cshtml")]
    public class Views_Alunos_Index : global::Microsoft.AspNetCore.Mvc.Razor.RazorPage<List<MultiplaEscolhaEdu.Model.AlunoModel>>
    {
        private static readonly global::Microsoft.AspNetCore.Razor.TagHelpers.TagHelperAttribute __tagHelperAttribute_0 = new global::Microsoft.AspNetCore.Razor.TagHelpers.TagHelperAttribute("src", new global::Microsoft.AspNetCore.Html.HtmlString("~/img/btnEdit.png"), global::Microsoft.AspNetCore.Razor.TagHelpers.HtmlAttributeValueStyle.DoubleQuotes);
        private static readonly global::Microsoft.AspNetCore.Razor.TagHelpers.TagHelperAttribute __tagHelperAttribute_1 = new global::Microsoft.AspNetCore.Razor.TagHelpers.TagHelperAttribute("alt", new global::Microsoft.AspNetCore.Html.HtmlString("Alterar Registro"), global::Microsoft.AspNetCore.Razor.TagHelpers.HtmlAttributeValueStyle.DoubleQuotes);
        private static readonly global::Microsoft.AspNetCore.Razor.TagHelpers.TagHelperAttribute __tagHelperAttribute_2 = new global::Microsoft.AspNetCore.Razor.TagHelpers.TagHelperAttribute("title", new global::Microsoft.AspNetCore.Html.HtmlString("Alterar Registro"), global::Microsoft.AspNetCore.Razor.TagHelpers.HtmlAttributeValueStyle.DoubleQuotes);
        private static readonly global::Microsoft.AspNetCore.Razor.TagHelpers.TagHelperAttribute __tagHelperAttribute_3 = new global::Microsoft.AspNetCore.Razor.TagHelpers.TagHelperAttribute("width", new global::Microsoft.AspNetCore.Html.HtmlString("20"), global::Microsoft.AspNetCore.Razor.TagHelpers.HtmlAttributeValueStyle.DoubleQuotes);
        private static readonly global::Microsoft.AspNetCore.Razor.TagHelpers.TagHelperAttribute __tagHelperAttribute_4 = new global::Microsoft.AspNetCore.Razor.TagHelpers.TagHelperAttribute("height", new global::Microsoft.AspNetCore.Html.HtmlString("20"), global::Microsoft.AspNetCore.Razor.TagHelpers.HtmlAttributeValueStyle.DoubleQuotes);
        private static readonly global::Microsoft.AspNetCore.Razor.TagHelpers.TagHelperAttribute __tagHelperAttribute_5 = new global::Microsoft.AspNetCore.Razor.TagHelpers.TagHelperAttribute("src", new global::Microsoft.AspNetCore.Html.HtmlString("~/img/btnDelete.png"), global::Microsoft.AspNetCore.Razor.TagHelpers.HtmlAttributeValueStyle.DoubleQuotes);
        private static readonly global::Microsoft.AspNetCore.Razor.TagHelpers.TagHelperAttribute __tagHelperAttribute_6 = new global::Microsoft.AspNetCore.Razor.TagHelpers.TagHelperAttribute("alt", new global::Microsoft.AspNetCore.Html.HtmlString("Excluir Registro"), global::Microsoft.AspNetCore.Razor.TagHelpers.HtmlAttributeValueStyle.DoubleQuotes);
        private static readonly global::Microsoft.AspNetCore.Razor.TagHelpers.TagHelperAttribute __tagHelperAttribute_7 = new global::Microsoft.AspNetCore.Razor.TagHelpers.TagHelperAttribute("title", new global::Microsoft.AspNetCore.Html.HtmlString("Excluir Registro"), global::Microsoft.AspNetCore.Razor.TagHelpers.HtmlAttributeValueStyle.DoubleQuotes);
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
        private global::Microsoft.AspNetCore.Mvc.Razor.TagHelpers.UrlResolutionTagHelper __Microsoft_AspNetCore_Mvc_Razor_TagHelpers_UrlResolutionTagHelper;
        #pragma warning disable 1998
        public async override global::System.Threading.Tasks.Task ExecuteAsync()
        {
            WriteLiteral("\r\n");
#nullable restore
#line 3 "D:\Projetos\multiplaescolhaedu\MultiplaEscolhaEdu.Admin\Views\Alunos\Index.cshtml"
  
    ViewData["Title"] = "Index";

#line default
#line hidden
#nullable disable
            WriteLiteral(@"<script>
    $(function () {
        var wTotalPaginas = 0;
        var wRotulo = """";
        $(""#GridAlunos"").DataTable({
            drawCallback: function () {
                this.api().state.clear();
                wTotalPaginas = $('.paginate_button:not(.previous,.next)').length;
                $('.paginate_button', this.api().table().container())
                    .on('click', function () {
                        var wTextoPosicaoPagina = $('.active').text(); // Pega o valor da página selecionada
                        var wPosicaoPagina = 0; // varíavel da posição da página

                        wPosicaoPagina = wTextoPosicaoPagina;

                        wRotulo = ""Página "" + wPosicaoPagina + "" de "" + wTotalPaginas + ""(total de "" + wQtde + "" registros)"";
                        $('#GridAlunos_info').empty();
                        $('#GridAlunos_info').html(wRotulo);
                    });
            },
            bJQueryUI: true,
            ""oLanguage"": {
      ");
            WriteLiteral(@"          ""sProcessing"": ""Processando..."",
                ""sLengthMenu"": ""Mostrar _MENU_ registros"",
                ""sZeroRecords"": ""Não foram encontrados resultados"",
                ""sInfo"": ""Mostrando de _START_ até _END_ de _TOTAL_ registros"",
                ""sInfoEmpty"": ""Mostrando de 0 até 0 de 0 registros"",
                ""sInfoFiltered"": """",
                ""sInfoPostFix"": """",
                ""sSearch"": ""Procurar:"",
                ""sUrl"": """",
                ""oPaginate"": {
                    ""sFirst"": ""Primeiro"",
                    ""sPrevious"": ""Anterior"",
                    ""sNext"": ""Próximo"",
                    ""sLast"": ""Último""
                }
            },
            destroy: true,
            searching: true,
            ordering: false,
            dom: 'Bfrtip',
            select: true,
            pageLength: 10
        });

        $('#GridAlunos_paginate').hide();

        $('input[type=""search""]').css(""width"", ""950px"");

    });

    function Carr");
            WriteLiteral(@"egarDadosAluno(Id) {
        window.location.href = ""/Alunos/Cadastro?id="" + Id;
    }

    function ExcluirDadosAluno(Id) {
        if (confirm(""Deseja excluir este registro?"") == true) {
            $.ajax({
                type: ""POST"",
                url: ""/Alunos/ExcluirAlunos?id=""+Id,
                async: false,
                dataType: ""JSON"",
                contentType: ""application/json; charset=UTF-8"",
                success: function (jsonResult) {
                    if (jsonResult.mensagem === 'Ok') {
                        window.location.reload(true);
                    } else {
                        alert(jsonResult.mensagem);
                    }
                }
            });
        } else {
            return false;
        }
    }
</script>
<section class=""section"">
    <h1 class=""section-header"">
        Lista de Alunos
    </h1>
    <div class=""section-body"">
        <div class=""table-responsive"" style=""overflow-x: auto"">
            <table i");
            WriteLiteral(@"d=""GridAlunos"" class=""table"" style=""width: 100%"">
                <thead class=""rotuloTable"">
                    <tr>
                        <th style=""width: 8%""><a href=""/Alunos/Cadastro"" title=""Novo Registro"">+</a></th>
                        <th style=""width: 20%"">Nome</th>
                        <th style=""width: 10%"">Cpf</th>
                        <th style=""width: 20%"">E-mail</th>
                        <th style=""width: 10%"">WhatsApp</th>
                        <th style=""width: 20%"">Cidade</th>
                        <th style=""width: 12%"">Estado</th>
                    </tr>
                </thead>
                <tbody id=""dadosGridAlunos"" class=""GridAlunos tablelinhaimp"">
");
#nullable restore
#line 102 "D:\Projetos\multiplaescolhaedu\MultiplaEscolhaEdu.Admin\Views\Alunos\Index.cshtml"
                     foreach (var item in Model)
                    {

#line default
#line hidden
#nullable disable
            WriteLiteral("                    <tr>\r\n                        <td>\r\n                            ");
            __tagHelperExecutionContext = __tagHelperScopeManager.Begin("img", global::Microsoft.AspNetCore.Razor.TagHelpers.TagMode.SelfClosing, "311dc20bd3a764229ceb915a01274ab6a8d7b1d410582", async() => {
            }
            );
            __Microsoft_AspNetCore_Mvc_Razor_TagHelpers_UrlResolutionTagHelper = CreateTagHelper<global::Microsoft.AspNetCore.Mvc.Razor.TagHelpers.UrlResolutionTagHelper>();
            __tagHelperExecutionContext.Add(__Microsoft_AspNetCore_Mvc_Razor_TagHelpers_UrlResolutionTagHelper);
            __tagHelperExecutionContext.AddHtmlAttribute(__tagHelperAttribute_0);
            __tagHelperExecutionContext.AddHtmlAttribute(__tagHelperAttribute_1);
            __tagHelperExecutionContext.AddHtmlAttribute(__tagHelperAttribute_2);
            __tagHelperExecutionContext.AddHtmlAttribute(__tagHelperAttribute_3);
            __tagHelperExecutionContext.AddHtmlAttribute(__tagHelperAttribute_4);
            BeginAddHtmlAttributeValues(__tagHelperExecutionContext, "onclick", 3, global::Microsoft.AspNetCore.Razor.TagHelpers.HtmlAttributeValueStyle.DoubleQuotes);
            AddHtmlAttributeValue("", 4150, "CarregarDadosAluno(", 4150, 19, true);
#nullable restore
#line 106 "D:\Projetos\multiplaescolhaedu\MultiplaEscolhaEdu.Admin\Views\Alunos\Index.cshtml"
AddHtmlAttributeValue("", 4169, item.Id, 4169, 8, false);

#line default
#line hidden
#nullable disable
            AddHtmlAttributeValue("", 4177, ")", 4177, 1, true);
            EndAddHtmlAttributeValues(__tagHelperExecutionContext);
            await __tagHelperRunner.RunAsync(__tagHelperExecutionContext);
            if (!__tagHelperExecutionContext.Output.IsContentModified)
            {
                await __tagHelperExecutionContext.SetOutputContentAsync();
            }
            Write(__tagHelperExecutionContext.Output);
            __tagHelperExecutionContext = __tagHelperScopeManager.End();
            WriteLiteral("\r\n                            ");
            __tagHelperExecutionContext = __tagHelperScopeManager.Begin("img", global::Microsoft.AspNetCore.Razor.TagHelpers.TagMode.SelfClosing, "311dc20bd3a764229ceb915a01274ab6a8d7b1d412585", async() => {
            }
            );
            __Microsoft_AspNetCore_Mvc_Razor_TagHelpers_UrlResolutionTagHelper = CreateTagHelper<global::Microsoft.AspNetCore.Mvc.Razor.TagHelpers.UrlResolutionTagHelper>();
            __tagHelperExecutionContext.Add(__Microsoft_AspNetCore_Mvc_Razor_TagHelpers_UrlResolutionTagHelper);
            __tagHelperExecutionContext.AddHtmlAttribute(__tagHelperAttribute_5);
            __tagHelperExecutionContext.AddHtmlAttribute(__tagHelperAttribute_6);
            __tagHelperExecutionContext.AddHtmlAttribute(__tagHelperAttribute_7);
            __tagHelperExecutionContext.AddHtmlAttribute(__tagHelperAttribute_3);
            __tagHelperExecutionContext.AddHtmlAttribute(__tagHelperAttribute_4);
            BeginAddHtmlAttributeValues(__tagHelperExecutionContext, "onclick", 3, global::Microsoft.AspNetCore.Razor.TagHelpers.HtmlAttributeValueStyle.DoubleQuotes);
            AddHtmlAttributeValue("", 4323, "ExcluirDadosAluno(", 4323, 18, true);
#nullable restore
#line 107 "D:\Projetos\multiplaescolhaedu\MultiplaEscolhaEdu.Admin\Views\Alunos\Index.cshtml"
AddHtmlAttributeValue("", 4341, item.Id, 4341, 8, false);

#line default
#line hidden
#nullable disable
            AddHtmlAttributeValue("", 4349, ")", 4349, 1, true);
            EndAddHtmlAttributeValues(__tagHelperExecutionContext);
            await __tagHelperRunner.RunAsync(__tagHelperExecutionContext);
            if (!__tagHelperExecutionContext.Output.IsContentModified)
            {
                await __tagHelperExecutionContext.SetOutputContentAsync();
            }
            Write(__tagHelperExecutionContext.Output);
            __tagHelperExecutionContext = __tagHelperScopeManager.End();
            WriteLiteral("\r\n                        </td>\r\n                        <td>");
#nullable restore
#line 109 "D:\Projetos\multiplaescolhaedu\MultiplaEscolhaEdu.Admin\Views\Alunos\Index.cshtml"
                       Write(item.Nome);

#line default
#line hidden
#nullable disable
            WriteLiteral("</td>\r\n                        <td>");
#nullable restore
#line 110 "D:\Projetos\multiplaescolhaedu\MultiplaEscolhaEdu.Admin\Views\Alunos\Index.cshtml"
                       Write(item.Cpf);

#line default
#line hidden
#nullable disable
            WriteLiteral("</td>\r\n                        <td>");
#nullable restore
#line 111 "D:\Projetos\multiplaescolhaedu\MultiplaEscolhaEdu.Admin\Views\Alunos\Index.cshtml"
                       Write(item.Email);

#line default
#line hidden
#nullable disable
            WriteLiteral("</td>\r\n                        <td>");
#nullable restore
#line 112 "D:\Projetos\multiplaescolhaedu\MultiplaEscolhaEdu.Admin\Views\Alunos\Index.cshtml"
                       Write(item.Whatsapp);

#line default
#line hidden
#nullable disable
            WriteLiteral("</td>\r\n                        <td>");
#nullable restore
#line 113 "D:\Projetos\multiplaescolhaedu\MultiplaEscolhaEdu.Admin\Views\Alunos\Index.cshtml"
                       Write(item.Cidade);

#line default
#line hidden
#nullable disable
            WriteLiteral("</td>\r\n                        <td>");
#nullable restore
#line 114 "D:\Projetos\multiplaescolhaedu\MultiplaEscolhaEdu.Admin\Views\Alunos\Index.cshtml"
                       Write(item.Estado);

#line default
#line hidden
#nullable disable
            WriteLiteral("</td>\r\n                    </tr>\r\n");
#nullable restore
#line 116 "D:\Projetos\multiplaescolhaedu\MultiplaEscolhaEdu.Admin\Views\Alunos\Index.cshtml"
                    }

#line default
#line hidden
#nullable disable
            WriteLiteral("                </tbody>\r\n            </table>\r\n        </div>\r\n    </div>\r\n</section>\r\n\r\n");
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
        public global::Microsoft.AspNetCore.Mvc.Rendering.IHtmlHelper<List<MultiplaEscolhaEdu.Model.AlunoModel>> Html { get; private set; }
    }
}
#pragma warning restore 1591
