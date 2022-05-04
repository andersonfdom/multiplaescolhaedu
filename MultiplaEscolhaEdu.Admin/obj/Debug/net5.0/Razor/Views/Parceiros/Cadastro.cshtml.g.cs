#pragma checksum "D:\Projetos\multiplaescolhaedu\MultiplaEscolhaEdu.Admin\Views\Parceiros\Cadastro.cshtml" "{ff1816ec-aa5e-4d10-87f7-6f4963833460}" "f68462e873767a003c1b71febf3792d09f14a915"
// <auto-generated/>
#pragma warning disable 1591
[assembly: global::Microsoft.AspNetCore.Razor.Hosting.RazorCompiledItemAttribute(typeof(AspNetCore.Views_Parceiros_Cadastro), @"mvc.1.0.view", @"/Views/Parceiros/Cadastro.cshtml")]
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
    [global::Microsoft.AspNetCore.Razor.Hosting.RazorSourceChecksumAttribute(@"SHA1", @"f68462e873767a003c1b71febf3792d09f14a915", @"/Views/Parceiros/Cadastro.cshtml")]
    [global::Microsoft.AspNetCore.Razor.Hosting.RazorSourceChecksumAttribute(@"SHA1", @"b34a49b024ae6342944c23a1a4b2a7141541591e", @"/Views/_ViewImports.cshtml")]
    public class Views_Parceiros_Cadastro : global::Microsoft.AspNetCore.Mvc.Razor.RazorPage<dynamic>
    {
        #pragma warning disable 1998
        public async override global::System.Threading.Tasks.Task ExecuteAsync()
        {
            WriteLiteral("\r\n");
#nullable restore
#line 2 "D:\Projetos\multiplaescolhaedu\MultiplaEscolhaEdu.Admin\Views\Parceiros\Cadastro.cshtml"
  
    ViewData["Title"] = "Cadastro";

#line default
#line hidden
#nullable disable
            WriteLiteral(@"

<script>
    $(function () {
        var id = getParameterByName(""id"") == null ? ""0"" : getParameterByName(""id"");

        if (id !==""0"") {
            $.ajax({
                type: ""POST"",
                url: ""/Parceiros/CarregarDados?id=""+id,
                async: false,
                dataType: ""JSON"",
                contentType: ""application/json; charset=UTF-8"",
                success: function (jsonResult) {
                    $(jsonResult.mensagem).each(function () {
                        document.getElementById(""id"").value = this.id;
                        document.getElementById(""nome"").value = this.nomeCompleto;
                        document.getElementById(""whatsapp"").value = this.whatsapp;
                        document.getElementById(""email"").value = this.email;
                        document.getElementById(""cep"").value = this.cep;
                        document.getElementById(""logradouro"").value = this.logradouro;
                        document.getElemen");
            WriteLiteral(@"tById(""complemento"").value = this.complemento;
                        document.getElementById(""bairro"").value = this.bairro;
                        document.getElementById(""cidade"").value = this.cidade;
                        document.getElementById(""estado"").value = this.estado;
                    });
                }
            });
        }

        $('#btnSalvar').click(function () {
            if (camposValidos() === true) {
                var data = new FormData();
                data.append(""Id"", document.getElementById(""id"").value);
                data.append(""NomeCompleto"", document.getElementById(""nome"").value);
                data.append(""Whatsapp"", document.getElementById(""whatsapp"").value);
                data.append(""Email"", document.getElementById(""email"").value);
                data.append(""Cep"", document.getElementById(""cep"").value);
                data.append(""Logradouro"", document.getElementById(""logradouro"").value);
                data.append(""Complemento"",");
            WriteLiteral(@" document.getElementById(""complemento"").value);
                data.append(""Bairro"", document.getElementById(""bairro"").value);
                data.append(""Cidade"", document.getElementById(""cidade"").value);
                data.append(""Estado"", document.getElementById(""estado"").value);

                $.ajax({
                    url: ""/Parceiros/Gravar"",
                    data: data,
                    processData: false,
                    contentType: false,
                    type: ""POST"",
                    success: function (data) {
                        if (data.mensagem === ""Ok"") {
                            window.location.href = ""/Parceiros/Index"";
                        } else {
                            alert(data.mensagem);
                        }
                    },
                    error: function (request, status, error) {
                        alert(request.responseText);
                    }
                });
            }
        });
    })");
            WriteLiteral(@";


    function camposValidos() {
        if (document.getElementById('nome').value === '') {
            alert('Campo obrigatório não preenchido: Nome ');
            document.getElementById('nome').focus();
            window.setTimeout(function () {
                $('#mensagemErro').hide();
                document.getElementById('mensagemErro').innerHTML = """";
            }, 6000);
            return false;
        }

        if (document.getElementById('whatsapp').value === '') {
            alert('Campo obrigatório não preenchido: WhatsApp ');
            document.getElementById('whatsapp').focus();
            window.setTimeout(function () {
                $('#mensagemErro').hide();
                document.getElementById('mensagemErro').innerHTML = """";
            }, 6000);
            return false;
        }

        if (document.getElementById('email').value === '') {
            alert('Campo obrigatório não preenchido: E-mail ');
            document.getElementById('ema");
            WriteLiteral(@"il').focus();
            window.setTimeout(function () {
                $('#mensagemErro').hide();
                document.getElementById('mensagemErro').innerHTML = """";
            }, 6000);
            return false;
        }

        if (document.getElementById('cep').value === '') {
            alert('Campo obrigatório não preenchido: Cep ');
            document.getElementById('cep').focus();
            window.setTimeout(function () {
                $('#mensagemErro').hide();
                document.getElementById('mensagemErro').innerHTML = """";
            }, 6000);
            return false;
        }

        if (document.getElementById('logradouro').value === '') {
            alert('Campo obrigatório não preenchido: Logradouro ');
            document.getElementById('logradouro').focus();
            window.setTimeout(function () {
                $('#mensagemErro').hide();
                document.getElementById('mensagemErro').innerHTML = """";
            }, 6000);
   ");
            WriteLiteral(@"         return false;
        }

        if (document.getElementById('complemento').value === '') {
            alert('Campo obrigatório não preenchido: Complemento ');
            document.getElementById('complemento').focus();
            window.setTimeout(function () {
                $('#mensagemErro').hide();
                document.getElementById('mensagemErro').innerHTML = """";
            }, 6000);
            return false;
        }

        if (document.getElementById('bairro').value === '') {
            alert('Campo obrigatório não preenchido: Bairro ');
            document.getElementById('bairro').focus();
            window.setTimeout(function () {
                $('#mensagemErro').hide();
                document.getElementById('mensagemErro').innerHTML = """";
            }, 6000);
            return false;
        }

        if (document.getElementById('cidade').value === '') {
            alert('Campo obrigatório não preenchido: Cidade ');
            document.getEl");
            WriteLiteral(@"ementById('cidade').focus();
            window.setTimeout(function () {
                $('#mensagemErro').hide();
                document.getElementById('mensagemErro').innerHTML = """";
            }, 6000);
            return false;
        }

        if (document.getElementById('estado').value === '') {
            alert('Campo obrigatório não preenchido: Estado ');
            document.getElementById('estado').focus();
            window.setTimeout(function () {
                $('#mensagemErro').hide();
                document.getElementById('mensagemErro').innerHTML = """";
            }, 6000);
            return false;
        }

        return true;
    }

    function getParameterByName(name, url = window.location.href) {
        name = name.replace(/[\[\]]/g, '\\$&');
        var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
            results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComp");
            WriteLiteral(@"onent(results[2].replace(/\+/g, ' '));
    }

    function mascaraTelefone(campo) {

        if (mascaraInteiro(campo) == false) {
            event.returnValue = false;
        }
        return formataCampo(campo, '(00)9 0000-0000', event);
    }

    function mascaraCep(cep) {
        if (mascaraInteiro(cep) == false) {
            event.returnValue = false;
        }
        return formataCampo(cep, '00.000-000', event);
    }

    function buscarCep(cep) {
        cep = cep.replace('.','');
        cep = cep.replace('/', '');

        $.getJSON(""https://viacep.com.br/ws/"" + cep + ""/json/?callback=?"", function (dados) {

            if (!(""erro"" in dados)) {
                //Atualiza os campos com os valores da consulta.
                $(""#logradouro"").val(dados.logradouro);
                $(""#bairro"").val(dados.bairro);
                $(""#cidade"").val(dados.localidade);
                $(""#estado"").val(dados.uf);
            } //end if.
            else {
              ");
            WriteLiteral(@"  //CEP pesquisado não foi encontrado.
                alert(""CEP não encontrado."");
                $('#cep').focus();
            }
        });
    }

    //formata de forma generica os campos
    function formataCampo(campo, Mascara, evento) {
        var boleanoMascara;

        var Digitato = evento.keyCode;
        exp = /\-|\.|\/|\(|\)| /g
        campoSoNumeros = campo.value.toString().replace(exp, """");

        var posicaoCampo = 0;
        var NovoValorCampo = """";
        var TamanhoMascara = campoSoNumeros.length;;

        if (Digitato != 8) { // backspace
            for (i = 0; i <= TamanhoMascara; i++) {
                boleanoMascara = ((Mascara.charAt(i) == ""-"") || (Mascara.charAt(i) == ""."")
                    || (Mascara.charAt(i) == ""/""))
                boleanoMascara = boleanoMascara || ((Mascara.charAt(i) == ""("")
                    || (Mascara.charAt(i) == "")"") || (Mascara.charAt(i) == "" ""))
                if (boleanoMascara) {
                    NovoValorCa");
            WriteLiteral(@"mpo += Mascara.charAt(i);
                    TamanhoMascara++;
                } else {
                    NovoValorCampo += campoSoNumeros.charAt(posicaoCampo);
                    posicaoCampo++;
                }
            }
            campo.value = NovoValorCampo;
            return true;
        } else {
            return true;
        }
    }

    function mascaraInteiro() {
        if (event.keyCode < 48 || event.keyCode > 57) {
            event.returnValue = false;
            return false;
        }
        return true;
    }

</script>
<section class=""section"">
    <h1 class=""section-header"">
        Cadastro de Parceiros
    </h1>
    <div class=""tab-content"" id=""myTabContent"">
        <div class=""tab-pane fade show active"" id=""dados-cadastrais"" role=""tabpanel"" aria-labelledby=""home-tab"">
            <div class=""table-responsive"" style=""overflow-x: auto"">

                <div id=""mensagemSucesso"" class=""alert alert-success"" style=""display:none"">

           ");
            WriteLiteral(@"     </div>
                <div id=""mensagemErro"" class=""alert alert-danger"" style=""display:none"">

                </div>
                <table class=""table"" style=""width: 100%"">
                    <tr>
                        <th>Nome Completo</th>
                    </tr>
                    <tr>
                        <td>
                            <input type=""hidden"" id=""id"" value=""0"" />
                            <input type=""text"" class=""form-control"" id=""nome"" maxlength=""200"" />
                        </td>
                    </tr>
                </table>
                <table class=""table"" style=""width: 100%"">
                    <tr>
                        <th>WhatsApp</th>
                        <th>E-mail</th>
                    </tr>
                    <tr>
                        <td><input type=""text"" class=""form-control"" id=""whatsapp"" maxlength=""15"" onkeypress=""mascaraTelefone(this);"" /></td>
                        <td><input type=""email"" class=""form-con");
            WriteLiteral(@"trol"" id=""email"" maxlength=""200"" /></td>
                    </tr>
                </table>
                <table class=""table"" style=""width: 100%"">
                    <tr>
                        <th style=""width:30%"">Cep</th>
                        <th style=""width:70%"">Logradouro</th>
                    </tr>
                    <tr>
                        <td><input type=""text"" class=""form-control"" id=""cep"" maxlength=""10"" onfocusout=""buscarCep(this.value)"" onkeypress=""mascaraCep(this)"" /></td>
                        <td><input type=""text"" class=""form-control"" id=""logradouro"" maxlength=""200"" /></td>
                    </tr>
                </table>
                <table class=""table"" style=""width: 100%"">
                    <tr>
                        <th>Complemento</th>
                        <th>Bairro</th>
                    </tr>
                    <tr>
                        <td><input type=""text"" class=""form-control"" id=""complemento"" maxlength=""200"" /></td>
         ");
            WriteLiteral(@"               <td><input type=""text"" class=""form-control"" id=""bairro"" maxlength=""200"" /></td>
                    </tr>
                </table>
                <table class=""table"" style=""width: 100%"">
                    <tr>
                        <th>Cidade</th>
                        <th>Estado</th>
                    </tr>
                    <tr>
                        <td><input type=""text"" class=""form-control"" id=""cidade"" maxlength=""200"" /></td>
                        <td><input type=""text"" class=""form-control"" id=""estado"" maxlength=""200"" /></td>
                    </tr>
                </table>
                <table class=""table"" style=""width: 100%"">
                    <tr>
                        <th></th>
                    </tr>
                    <tr>
                        <td><input type=""button"" class=""btn btn-primary"" id=""btnSalvar"" value=""Salvar"" />&nbsp;<input type=""button"" class=""btn btn-danger"" id=""btnCancelar"" value=""Cancelar"" onclick=""window.location.href ");
            WriteLiteral("= \'/Parceiros/Index\'\" /></td>\r\n                    </tr>\r\n                </table>\r\n            </div>\r\n        </div>\r\n    </div>\r\n</section>\r\n\r\n");
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
