#pragma checksum "D:\Projetos\multiplaescolhaedu\MultiplaEscolhaEdu.Admin\Views\Parametros\Index.cshtml" "{ff1816ec-aa5e-4d10-87f7-6f4963833460}" "7be3871468bdfb118581b395533b82edf56879fb"
// <auto-generated/>
#pragma warning disable 1591
[assembly: global::Microsoft.AspNetCore.Razor.Hosting.RazorCompiledItemAttribute(typeof(AspNetCore.Views_Parametros_Index), @"mvc.1.0.view", @"/Views/Parametros/Index.cshtml")]
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
    [global::Microsoft.AspNetCore.Razor.Hosting.RazorSourceChecksumAttribute(@"SHA1", @"7be3871468bdfb118581b395533b82edf56879fb", @"/Views/Parametros/Index.cshtml")]
    [global::Microsoft.AspNetCore.Razor.Hosting.RazorSourceChecksumAttribute(@"SHA1", @"b34a49b024ae6342944c23a1a4b2a7141541591e", @"/Views/_ViewImports.cshtml")]
    #nullable restore
    public class Views_Parametros_Index : global::Microsoft.AspNetCore.Mvc.Razor.RazorPage<MultiplaEscolhaEdu.Model.EmpresaModel>
    #nullable disable
    {
        #pragma warning disable 1998
        public async override global::System.Threading.Tasks.Task ExecuteAsync()
        {
#nullable restore
#line 2 "D:\Projetos\multiplaescolhaedu\MultiplaEscolhaEdu.Admin\Views\Parametros\Index.cshtml"
  
    ViewData["Title"] = "Index";

#line default
#line hidden
#nullable disable
            WriteLiteral(@"
<script>
    function GravarEmpresa() {
        if (camposValidos() === true) {
            var formData = new FormData();

            formData.append('Id', $('#IdEmpresa').val());
            formData.append('NomeFantasia', $('#NomeFantasia').val());
            formData.append('RazaoSocial', $('#RazaoSocial').val());
            formData.append('Cnpj', $('#Cnpj').val());
            formData.append('InscricaoEstadual', $('#InscricaoEstadual').val());
            formData.append('Telefone', $('#Telefone').val());
            formData.append('Celular', $('#Celular').val());
            formData.append('Email', $('#Email').val());
            formData.append('Cep', $('#Cep').val());
            formData.append('Logradouro', $('#Logradouro').val());
            formData.append('Numero', $('#Numero').val());
            formData.append('Complemento', $('#Complemento').val());
            formData.append('Bairro', $('#Bairro').val());
            formData.append('Cidade', $('#Cidade').val());");
            WriteLiteral(@"
            formData.append('Estado', $('#Estado').val());

            $.ajax(
                {
                    url: ""/Parametros/GravarEmpresa"",
                    data: formData,
                    processData: false,
                    contentType: false,
                    type: ""POST"",
                    success: function (data) {
                        window.location.href = ""/Home/Index"";
                    }
                }
            );
        }        
    }

    function camposValidos() {
        if (document.getElementById('NomeFantasia').value === '') {
            alert('Campo obrigatório não preenchido: Nome Fantasia ');
            document.getElementById('NomeFantasia').focus();
            return false;
        }

        if (document.getElementById('RazaoSocial').value === '') {
            alert('Campo obrigatório não preenchido: Razão Social ');
            document.getElementById('RazaoSocial').focus();
            return false;
        }

            WriteLiteral(@"
        if (document.getElementById('Cnpj').value === '') {
            alert('Campo obrigatório não preenchido: Cnpj ');
            document.getElementById('Cnpj').focus();
            return false;
        }

        if (document.getElementById('Telefone').value === '') {
            alert('Campo obrigatório não preenchido: Telefone ');
            document.getElementById('Telefone').focus();
            return false;
        }

        if (document.getElementById('Celular').value === '') {
            alert('Campo obrigatório não preenchido: Celular ');
            document.getElementById('Celular').focus();
            return false;
        }

        if (document.getElementById('Email').value === '') {
            alert('Campo obrigatório não preenchido: E-mail ');
            document.getElementById('Email').focus();
            return false;
        }

        if (document.getElementById('Cep').value === '') {
            alert('Campo obrigatório não preenchido: Cep ');
    ");
            WriteLiteral(@"        document.getElementById('Cep').focus();
            return false;
        }

        if (document.getElementById('Logradouro').value === '') {
            alert('Campo obrigatório não preenchido: Logradouro ');
            document.getElementById('Logradouro').focus();
            return false;
        }

        if (document.getElementById('Numero').value === '') {
            alert('Campo obrigatório não preenchido: Número ');
            document.getElementById('Numero').focus();
            return false;
        }

        if (document.getElementById('Bairro').value === '') {
            alert('Campo obrigatório não preenchido: Bairro ');
            document.getElementById('Bairro').focus();
            return false;
        }

        if (document.getElementById('Cidade').value === '') {
            alert('Campo obrigatório não preenchido: Cidade ');
            document.getElementById('Cidade').focus();
            return false;
        }

        if (document.getEle");
            WriteLiteral(@"mentById('Estado').value === '') {
            alert('Campo obrigatório não preenchido: Estado ');
            document.getElementById('Estado').focus();
            return false;
        }

        return true;
    }

    function mascaraTelefone(campo) {

        if (mascaraInteiro(campo) == false) {
            event.returnValue = false;
        }
        return formataCampo(campo, '(00)9 0000-0000', event);
    }

    function mascaraCnpj(cnpj) {
        if (mascaraInteiro(cnpj) == false) {
            event.returnValue = false;
        }
        return formataCampo(cnpj, '00.000.000/0000-00', event);
    }

    function mascaraCep(cep) {
        if (mascaraInteiro(cep) == false) {
            event.returnValue = false;
        }
        return formataCampo(cep, '00.000-000', event);
    }

    function mascaraInteiro() {
        if (event.keyCode < 48 || event.keyCode > 57) {
            event.returnValue = false;
            return false;
        }
        return true");
            WriteLiteral(@";
    }

    function BuscarCep(cep) {
        cep = cep.replace('.', '');
        cep = cep.replace('-', '');

        $.getJSON(""https://viacep.com.br/ws/"" + cep + ""/json/?callback=?"", function (dados) {

            if (!(""erro"" in dados)) {
                $(""#Logradouro"").val(dados.logradouro);
                $(""#Bairro"").val(dados.bairro);
                $(""#Cidade"").val(dados.localidade);
                $(""#Estado"").val(dados.uf);
            }
            else {
                alert(""CEP não encontrado."");
            }
        });
    }
</script>

<section class=""section"">
    <h1 class=""section-header"">
        Parâmetros Configuração da Empresa
    </h1>
    <div class=""section-body"">
        <input type=""hidden"" id=""IdEmpresa""");
            BeginWriteAttribute("value", " value=\"", 5986, "\"", 6003, 1);
#nullable restore
#line 172 "D:\Projetos\multiplaescolhaedu\MultiplaEscolhaEdu.Admin\Views\Parametros\Index.cshtml"
WriteAttributeValue("", 5994, Model.Id, 5994, 9, false);

#line default
#line hidden
#nullable disable
            EndWriteAttribute();
            WriteLiteral(@" />
        <ul class=""nav nav-tabs"" id=""myTab"" role=""tablist"">
            <li class=""nav-item"">
                <a class=""nav-link active"" id=""home-tab"" data-toggle=""tab"" href=""#dados-cadastrais"" role=""tab"" aria-controls=""dados-cadastrais"" aria-selected=""true"">Dados Cadastrais</a>
            </li>
            <li class=""nav-item"">
                <a class=""nav-link"" id=""profile-tab"" data-toggle=""tab"" href=""#dados-endereco"" role=""tab"" aria-controls=""dados-endereco"" aria-selected=""false"">Dados do Endereço</a>
            </li>
        </ul>
        <div class=""tab-content"" id=""myTabContent"">
            <div class=""tab-pane fade show active"" id=""dados-cadastrais"" role=""tabpanel"" aria-labelledby=""home-tab"">
                <div class=""table-responsive"" style=""overflow-x: auto"">
                    <table class=""table"" style=""width: 100%"">
                        <tr>
                            <th>Nome Fantasia</th>
                            <th>Razão Social</th>
                        </t");
            WriteLiteral("r>\r\n                        <tr>\r\n                            <td><input type=\"text\" id=\"NomeFantasia\" name=\"NomeFantasia\"");
            BeginWriteAttribute("value", " value=\"", 7150, "\"", 7177, 1);
#nullable restore
#line 190 "D:\Projetos\multiplaescolhaedu\MultiplaEscolhaEdu.Admin\Views\Parametros\Index.cshtml"
WriteAttributeValue("", 7158, Model.NomeFantasia, 7158, 19, false);

#line default
#line hidden
#nullable disable
            EndWriteAttribute();
            WriteLiteral(" class=\"form-control\" /></td>\r\n                            <td><input type=\"text\" id=\"RazaoSocial\" name=\"RazaoSocial\"");
            BeginWriteAttribute("value", " value=\"", 7295, "\"", 7321, 1);
#nullable restore
#line 191 "D:\Projetos\multiplaescolhaedu\MultiplaEscolhaEdu.Admin\Views\Parametros\Index.cshtml"
WriteAttributeValue("", 7303, Model.RazaoSocial, 7303, 18, false);

#line default
#line hidden
#nullable disable
            EndWriteAttribute();
            WriteLiteral(@" class=""form-control"" /></td>
                        </tr>
                    </table>
                    <table class=""table"" style=""width: 100%"">
                        <tr>
                            <th>CNPJ</th>
                            <th>Inscrição Estadual</th>
                        </tr>
                        <tr>
                            <td><input type=""text"" id=""Cnpj"" name=""Cnpj""");
            BeginWriteAttribute("value", " value=\"", 7740, "\"", 7759, 1);
#nullable restore
#line 200 "D:\Projetos\multiplaescolhaedu\MultiplaEscolhaEdu.Admin\Views\Parametros\Index.cshtml"
WriteAttributeValue("", 7748, Model.Cnpj, 7748, 11, false);

#line default
#line hidden
#nullable disable
            EndWriteAttribute();
            WriteLiteral(" onkeypress=\"mascaraCnpj(this)\" class=\"form-control\" /></td>\r\n                            <td><input type=\"text\" id=\"InscricaoEstadual\" name=\"InscricaoEstadual\"");
            BeginWriteAttribute("value", " value=\"", 7920, "\"", 7952, 1);
#nullable restore
#line 201 "D:\Projetos\multiplaescolhaedu\MultiplaEscolhaEdu.Admin\Views\Parametros\Index.cshtml"
WriteAttributeValue("", 7928, Model.InscricaoEstadual, 7928, 24, false);

#line default
#line hidden
#nullable disable
            EndWriteAttribute();
            WriteLiteral(@" class=""form-control"" /></td>
                        </tr>
                    </table>
                    <table class=""table"" style=""width: 100%"">
                        <tr>
                            <th>Telefone</th>
                            <th>Celular</th>
                        </tr>
                        <tr>
                            <td><input type=""text"" id=""Telefone"" name=""Telefone""");
            BeginWriteAttribute("value", " value=\"", 8372, "\"", 8395, 1);
#nullable restore
#line 210 "D:\Projetos\multiplaescolhaedu\MultiplaEscolhaEdu.Admin\Views\Parametros\Index.cshtml"
WriteAttributeValue("", 8380, Model.Telefone, 8380, 15, false);

#line default
#line hidden
#nullable disable
            EndWriteAttribute();
            WriteLiteral(" onkeypress=\"mascaraTelefone(this)\"  class=\"form-control\" /></td>\r\n                            <td><input type=\"text\" id=\"Celular\" name=\"Celular\"");
            BeginWriteAttribute("value", " value=\"", 8541, "\"", 8563, 1);
#nullable restore
#line 211 "D:\Projetos\multiplaescolhaedu\MultiplaEscolhaEdu.Admin\Views\Parametros\Index.cshtml"
WriteAttributeValue("", 8549, Model.Celular, 8549, 14, false);

#line default
#line hidden
#nullable disable
            EndWriteAttribute();
            WriteLiteral(@" class=""form-control"" /></td>
                        </tr>
                    </table>
                    <table class=""table"" style=""width: 100%"">
                        <tr>
                            <th>E-mail</th>
                        </tr>
                        <tr>
                            <td><input type=""email"" id=""Email"" name=""Email""");
            BeginWriteAttribute("value", " value=\"", 8930, "\"", 8950, 1);
#nullable restore
#line 219 "D:\Projetos\multiplaescolhaedu\MultiplaEscolhaEdu.Admin\Views\Parametros\Index.cshtml"
WriteAttributeValue("", 8938, Model.Email, 8938, 12, false);

#line default
#line hidden
#nullable disable
            EndWriteAttribute();
            WriteLiteral(@" class=""form-control"" /></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class=""tab-pane fade"" id=""dados-endereco"" role=""tabpanel"" aria-labelledby=""profile-tab"">
                <div class=""table-responsive"" style=""overflow-x: auto"">
                    <table class=""table"" style=""width: 100%"">
                        <tr>
                            <th style=""width: 20%"">Cep</th>
                            <th style=""width: 60%"">Logradouro</th>
                            <th style=""width: 20%"">Número</th>
                        </tr>
                        <tr>
                            <td style=""width: 20%"">
                                <input type=""text"" id=""Cep"" name=""Cep"" onkeypress=""mascaraCep(this)"" onfocusout=""BuscarCep(this.value);""");
            BeginWriteAttribute("value", " value=\"", 9803, "\"", 9821, 1);
#nullable restore
#line 234 "D:\Projetos\multiplaescolhaedu\MultiplaEscolhaEdu.Admin\Views\Parametros\Index.cshtml"
WriteAttributeValue("", 9811, Model.Cep, 9811, 10, false);

#line default
#line hidden
#nullable disable
            EndWriteAttribute();
            WriteLiteral(" class=\"form-control\" />\r\n                            </td>\r\n                            <td style=\"width: 60%\">\r\n                                <input type=\"text\" id=\"Logradouro\" name=\"Logradouro\"");
            BeginWriteAttribute("value", " value=\"", 10020, "\"", 10045, 1);
#nullable restore
#line 237 "D:\Projetos\multiplaescolhaedu\MultiplaEscolhaEdu.Admin\Views\Parametros\Index.cshtml"
WriteAttributeValue("", 10028, Model.Logradouro, 10028, 17, false);

#line default
#line hidden
#nullable disable
            EndWriteAttribute();
            WriteLiteral(" class=\"form-control\" />\r\n                            </td>\r\n                            <td style=\"width: 20%\">\r\n                                <input type=\"text\" id=\"Numero\" name=\"Numero\"");
            BeginWriteAttribute("value", " value=\"", 10236, "\"", 10257, 1);
#nullable restore
#line 240 "D:\Projetos\multiplaescolhaedu\MultiplaEscolhaEdu.Admin\Views\Parametros\Index.cshtml"
WriteAttributeValue("", 10244, Model.Numero, 10244, 13, false);

#line default
#line hidden
#nullable disable
            EndWriteAttribute();
            WriteLiteral(@" class=""form-control"" />
                            </td>
                        </tr>
                    </table>
                    <table class=""table"" style=""width: 100%"">
                        <tr>
                            <th>Complemento</th>
                            <th>Bairro</th>
                        </tr>
                        <tr>
                            <td>
                                <input type=""text"" id=""Complemento"" name=""Complemento""");
            BeginWriteAttribute("value", " value=\"", 10749, "\"", 10775, 1);
#nullable restore
#line 251 "D:\Projetos\multiplaescolhaedu\MultiplaEscolhaEdu.Admin\Views\Parametros\Index.cshtml"
WriteAttributeValue("", 10757, Model.Complemento, 10757, 18, false);

#line default
#line hidden
#nullable disable
            EndWriteAttribute();
            WriteLiteral(" class=\"form-control\" />\r\n                            </td>\r\n                            <td>\r\n                                <input type=\"text\" id=\"Bairro\" name=\"Bairro\"");
            BeginWriteAttribute("value", " value=\"", 10947, "\"", 10968, 1);
#nullable restore
#line 254 "D:\Projetos\multiplaescolhaedu\MultiplaEscolhaEdu.Admin\Views\Parametros\Index.cshtml"
WriteAttributeValue("", 10955, Model.Bairro, 10955, 13, false);

#line default
#line hidden
#nullable disable
            EndWriteAttribute();
            WriteLiteral(@" class=""form-control"" />
                            </td>
                        </tr>
                    </table>
                    <table class=""table"" style=""width: 100%"">
                        <tr>
                            <th style=""width: 50%"">Cidade</th>
                            <th style=""width: 50%"">Estado</th>
                        </tr>
                        <tr>
                            <td style=""width: 50%"">
                                <input type=""text"" id=""Cidade"" name=""Bairro""");
            BeginWriteAttribute("value", " value=\"", 11502, "\"", 11523, 1);
#nullable restore
#line 265 "D:\Projetos\multiplaescolhaedu\MultiplaEscolhaEdu.Admin\Views\Parametros\Index.cshtml"
WriteAttributeValue("", 11510, Model.Cidade, 11510, 13, false);

#line default
#line hidden
#nullable disable
            EndWriteAttribute();
            WriteLiteral(" class=\"form-control\" />\r\n                            </td>\r\n                            <td style=\"width: 50%\">\r\n                                <input type=\"text\" id=\"Estado\" name=\"Bairro\"");
            BeginWriteAttribute("value", " value=\"", 11714, "\"", 11735, 1);
#nullable restore
#line 268 "D:\Projetos\multiplaescolhaedu\MultiplaEscolhaEdu.Admin\Views\Parametros\Index.cshtml"
WriteAttributeValue("", 11722, Model.Estado, 11722, 13, false);

#line default
#line hidden
#nullable disable
            EndWriteAttribute();
            WriteLiteral(@" class=""form-control"" />
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <table class=""table"" style=""width:100%"">
                <tr>
                    <td>
                        <input type=""button"" class=""btn btn-primary"" id=""btnSalvar"" value=""Salvar"" onclick=""GravarEmpresa();"" />
                        <input type=""button"" id=""btnCancelar"" value=""Cancelar"" class=""btn btn-danger"" onclick=""window.location.href = '/Home/Index'"" />
                    </td>
                </tr>
            </table>
        </div>
    </div>
</section>

");
        }
        #pragma warning restore 1998
        #nullable restore
        [global::Microsoft.AspNetCore.Mvc.Razor.Internal.RazorInjectAttribute]
        public global::Microsoft.AspNetCore.Mvc.ViewFeatures.IModelExpressionProvider ModelExpressionProvider { get; private set; } = default!;
        #nullable disable
        #nullable restore
        [global::Microsoft.AspNetCore.Mvc.Razor.Internal.RazorInjectAttribute]
        public global::Microsoft.AspNetCore.Mvc.IUrlHelper Url { get; private set; } = default!;
        #nullable disable
        #nullable restore
        [global::Microsoft.AspNetCore.Mvc.Razor.Internal.RazorInjectAttribute]
        public global::Microsoft.AspNetCore.Mvc.IViewComponentHelper Component { get; private set; } = default!;
        #nullable disable
        #nullable restore
        [global::Microsoft.AspNetCore.Mvc.Razor.Internal.RazorInjectAttribute]
        public global::Microsoft.AspNetCore.Mvc.Rendering.IJsonHelper Json { get; private set; } = default!;
        #nullable disable
        #nullable restore
        [global::Microsoft.AspNetCore.Mvc.Razor.Internal.RazorInjectAttribute]
        public global::Microsoft.AspNetCore.Mvc.Rendering.IHtmlHelper<MultiplaEscolhaEdu.Model.EmpresaModel> Html { get; private set; } = default!;
        #nullable disable
    }
}
#pragma warning restore 1591