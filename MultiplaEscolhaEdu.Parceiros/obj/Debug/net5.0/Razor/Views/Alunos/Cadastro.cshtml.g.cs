#pragma checksum "D:\Projetos\multiplaescolhaedu\MultiplaEscolhaEdu.Parceiros\Views\Alunos\Cadastro.cshtml" "{ff1816ec-aa5e-4d10-87f7-6f4963833460}" "d6087873297784d7acf20dc3763658b64c20d119"
// <auto-generated/>
#pragma warning disable 1591
[assembly: global::Microsoft.AspNetCore.Razor.Hosting.RazorCompiledItemAttribute(typeof(AspNetCore.Views_Alunos_Cadastro), @"mvc.1.0.view", @"/Views/Alunos/Cadastro.cshtml")]
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
#line 1 "D:\Projetos\multiplaescolhaedu\MultiplaEscolhaEdu.Parceiros\Views\_ViewImports.cshtml"
using MultiplaEscolhaEdu.Parceiros;

#line default
#line hidden
#nullable disable
#nullable restore
#line 2 "D:\Projetos\multiplaescolhaedu\MultiplaEscolhaEdu.Parceiros\Views\_ViewImports.cshtml"
using MultiplaEscolhaEdu.Parceiros.Models;

#line default
#line hidden
#nullable disable
    [global::Microsoft.AspNetCore.Razor.Hosting.RazorSourceChecksumAttribute(@"SHA1", @"d6087873297784d7acf20dc3763658b64c20d119", @"/Views/Alunos/Cadastro.cshtml")]
    [global::Microsoft.AspNetCore.Razor.Hosting.RazorSourceChecksumAttribute(@"SHA1", @"173007ae5bdb5be7e6baddc7e5001bb136c5c959", @"/Views/_ViewImports.cshtml")]
    public class Views_Alunos_Cadastro : global::Microsoft.AspNetCore.Mvc.Razor.RazorPage<dynamic>
    {
        private static readonly global::Microsoft.AspNetCore.Razor.TagHelpers.TagHelperAttribute __tagHelperAttribute_0 = new global::Microsoft.AspNetCore.Razor.TagHelpers.TagHelperAttribute("value", "0", global::Microsoft.AspNetCore.Razor.TagHelpers.HtmlAttributeValueStyle.DoubleQuotes);
        private static readonly global::Microsoft.AspNetCore.Razor.TagHelpers.TagHelperAttribute __tagHelperAttribute_1 = new global::Microsoft.AspNetCore.Razor.TagHelpers.TagHelperAttribute("value", "5", global::Microsoft.AspNetCore.Razor.TagHelpers.HtmlAttributeValueStyle.DoubleQuotes);
        private static readonly global::Microsoft.AspNetCore.Razor.TagHelpers.TagHelperAttribute __tagHelperAttribute_2 = new global::Microsoft.AspNetCore.Razor.TagHelpers.TagHelperAttribute("value", "10", global::Microsoft.AspNetCore.Razor.TagHelpers.HtmlAttributeValueStyle.DoubleQuotes);
        private static readonly global::Microsoft.AspNetCore.Razor.TagHelpers.TagHelperAttribute __tagHelperAttribute_3 = new global::Microsoft.AspNetCore.Razor.TagHelpers.TagHelperAttribute("value", "15", global::Microsoft.AspNetCore.Razor.TagHelpers.HtmlAttributeValueStyle.DoubleQuotes);
        private static readonly global::Microsoft.AspNetCore.Razor.TagHelpers.TagHelperAttribute __tagHelperAttribute_4 = new global::Microsoft.AspNetCore.Razor.TagHelpers.TagHelperAttribute("value", "20", global::Microsoft.AspNetCore.Razor.TagHelpers.HtmlAttributeValueStyle.DoubleQuotes);
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
#line 2 "D:\Projetos\multiplaescolhaedu\MultiplaEscolhaEdu.Parceiros\Views\Alunos\Cadastro.cshtml"
  
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
                url: ""/Alunos/CarregarDados?id=""+id,
                async: false,
                dataType: ""JSON"",
                contentType: ""application/json; charset=UTF-8"",
                success: function (jsonResult) {
                    $(jsonResult.mensagem).each(function () {
                        document.getElementById(""id"").value = this.id;
                        document.getElementById(""nome"").value = this.nome;
                        document.getElementById(""data_nascimento"").value = this.dataNascimento;
                        document.getElementById(""rg"").value = this.rg;
                        document.getElementById(""cpf"").value = this.cpf;
                        document.getElementById(""whatsapp"").value = this.whatsapp;
                        document.getElementById(""ema");
            WriteLiteral(@"il"").value = this.email;
                        document.getElementById(""investimento"").value = this.investimento;
                        document.getElementById(""melhorDataPagamento"").value = this.melhorDataPagamento;
                        document.getElementById(""cep"").value = this.cep;
                        document.getElementById(""logradouro"").value = this.logradouro;
                        document.getElementById(""complemento"").value = this.complemento;
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
                data.append");
            WriteLiteral(@"(""Nome"", document.getElementById(""nome"").value);
                data.append(""Rg"", document.getElementById(""rg"").value);
                data.append(""DataNascimento"", document.getElementById(""data_nascimento"").value);
                data.append(""Cpf"", document.getElementById(""cpf"").value);
                data.append(""Whatsapp"", document.getElementById(""whatsapp"").value);
                data.append(""Email"", document.getElementById(""email"").value);
                data.append(""Investimento"", document.getElementById(""investimento"").value);
                data.append(""MelhorDataPagamento"", document.getElementById(""melhorDataPagamento"").value);
                data.append(""Cep"", document.getElementById(""cep"").value);
                data.append(""Logradouro"", document.getElementById(""logradouro"").value);
                data.append(""Complemento"", document.getElementById(""complemento"").value);
                data.append(""Bairro"", document.getElementById(""bairro"").value);
                data.append(");
            WriteLiteral(@"""Cidade"", document.getElementById(""cidade"").value);
                data.append(""Estado"", document.getElementById(""estado"").value);

                $.ajax({
                    url: ""/Alunos/Gravar"",
                    data: data,
                    processData: false,
                    contentType: false,
                    type: ""POST"",
                    success: function (data) {
                        if (data.mensagem === ""Ok"") {
                            window.location.href = ""/Alunos/Index"";
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
    });


    function camposValidos() {
        if (document.getElementById('nome').value === '') {
            alert('Campo obrigatório não preenchido: Nome ');
 ");
            WriteLiteral(@"           document.getElementById('nome').focus();
            window.setTimeout(function () {
                $('#mensagemErro').hide();
                document.getElementById('mensagemErro').innerHTML = """";
            }, 6000);
            return false;
        }

        if (document.getElementById('data_nascimento').value === '') {
            alert('Campo obrigatório não preenchido: Data de Nascimento ');
            document.getElementById('data_nascimento').focus();
            window.setTimeout(function () {
                $('#mensagemErro').hide();
                document.getElementById('mensagemErro').innerHTML = """";
            }, 6000);
            return false;
        }

        if (document.getElementById('rg').value === '') {
            alert('Campo obrigatório não preenchido: Rg ');
            document.getElementById('rg').focus();
            window.setTimeout(function () {
                $('#mensagemErro').hide();
                document.getElementById('mensa");
            WriteLiteral(@"gemErro').innerHTML = """";
            }, 6000);
            return false;
        }

        if (document.getElementById('cpf').value === '') {
            alert('Campo obrigatório não preenchido: Cpf ');
            document.getElementById('cpf').focus();
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
            alert('Campo obrigatório não preenchido: E-ma");
            WriteLiteral(@"il ');
            document.getElementById('email').focus();
            window.setTimeout(function () {
                $('#mensagemErro').hide();
                document.getElementById('mensagemErro').innerHTML = """";
            }, 6000);
            return false;
        }

        if (document.getElementById('investimento').value === '') {
            alert('Campo obrigatório não preenchido: Investimento ');
            document.getElementById('investimento').focus();
            window.setTimeout(function () {
                $('#mensagemErro').hide();
                document.getElementById('mensagemErro').innerHTML = """";
            }, 6000);
            return false;
        }

        if (document.getElementById('melhorDataPagamento').value === '0' || document.getElementById('melhorDataPagamento').value === 0) {
            alert('Campo obrigatório não preenchido: Melhor Data para Pagamento ');
            document.getElementById('melhorDataPagamento').focus();
            wind");
            WriteLiteral(@"ow.setTimeout(function () {
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
            return false;
       ");
            WriteLiteral(@" }

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
            document.getElementById('cidade').focus();
 ");
            WriteLiteral(@"           window.setTimeout(function () {
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
        return decodeURIComponent(results[2].replace(/\+/g,");
            WriteLiteral(@" ' '));
    }

    function mascaraTelefone(campo) {

        if (mascaraInteiro(campo) == false) {
            event.returnValue = false;
        }
        return formataCampo(campo, '(00)9 0000-0000', event);
    }

    function mascaraRg(rg) {
        if ((rg) == false) {
            event.returnValue = false;
        }
        return formataCampo(rg, '00.000.000-0', event);
    }

    function mascaraCpf(cpf) {
        if (mascaraInteiro(cpf) == false) {
            event.returnValue = false;
        }
        return formataCampo(cpf, '000.000.000-00', event);
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

            if (!(""erro"" ");
            WriteLiteral(@"in dados)) {
                //Atualiza os campos com os valores da consulta.
                $(""#logradouro"").val(dados.logradouro);
                $(""#bairro"").val(dados.bairro);
                $(""#cidade"").val(dados.localidade);
                $(""#estado"").val(dados.uf);
            } //end if.
            else {
                //CEP pesquisado não foi encontrado.
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
                boleanoMascara = ");
            WriteLiteral(@"((Mascara.charAt(i) == ""-"") || (Mascara.charAt(i) == ""."")
                    || (Mascara.charAt(i) == ""/""))
                boleanoMascara = boleanoMascara || ((Mascara.charAt(i) == ""("")
                    || (Mascara.charAt(i) == "")"") || (Mascara.charAt(i) == "" ""))
                if (boleanoMascara) {
                    NovoValorCampo += Mascara.charAt(i);
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
        Cadastro de Alunos
    </h1>
");
            WriteLiteral(@"    <div class=""tab-content"" id=""myTabContent"">
        <div class=""tab-pane fade show active"" id=""dados-cadastrais"" role=""tabpanel"" aria-labelledby=""home-tab"">
            <div class=""table-responsive"" style=""overflow-x: auto"">

                <div id=""mensagemSucesso"" class=""alert alert-success"" style=""display:none"">

                </div>
                <div id=""mensagemErro"" class=""alert alert-danger"" style=""display:none"">

                </div>
                <table class=""table"" style=""width: 100%"">
                    <tr>
                        <th>Nome</th>
                        <th>Data de Nascimento</th>
                    </tr>
                    <tr>
                        <td>
                            <input type=""hidden"" id=""id"" value=""0"" />
                            <input type=""text"" class=""form-control"" id=""nome"" maxlength=""200"" />
                        </td>
                        <td><input type=""date"" class=""form-control"" id=""data_nascimento"" /></td>");
            WriteLiteral(@"
                    </tr>
                </table>
                <table class=""table"" style=""width: 100%"">
                    <tr>
                        <th>Rg</th>
                        <th>Cpf</th>
                    </tr>
                    <tr>
                        <td><input type=""text"" class=""form-control"" id=""rg"" maxlength=""12"" onkeypress=""mascaraRg(this)"" /></td>
                        <td><input type=""text"" class=""form-control"" id=""cpf"" maxlength=""14"" onkeypress=""mascaraCpf(this)"" /></td>
                    </tr>
                </table>
                <table class=""table"" style=""width: 100%"">
                    <tr>
                        <th>WhatsApp</th>
                        <th>E-mail</th>
                    </tr>
                    <tr>
                        <td><input type=""text"" class=""form-control"" id=""whatsapp"" maxlength=""15"" onkeypress=""mascaraTelefone(this);"" /></td>
                        <td><input type=""email"" class=""form-control"" id=""email""");
            WriteLiteral(@" maxlength=""200"" /></td>
                    </tr>
                </table>
                <table class=""table"" style=""width: 100%"">
                    <tr>
                        <th>Investimento</th>
                        <th>Melhor data para pagamento</th>
                    </tr>
                    <tr>
                        <td><input type=""text"" class=""form-control"" id=""investimento"" maxlength=""200"" /></td>
                        <td>
                            <select class=""form-control"" id=""melhorDataPagamento"" name=""melhorDataPagamento"">
                                ");
            __tagHelperExecutionContext = __tagHelperScopeManager.Begin("option", global::Microsoft.AspNetCore.Razor.TagHelpers.TagMode.StartTagAndEndTag, "d6087873297784d7acf20dc3763658b64c20d11921583", async() => {
                WriteLiteral("--Selecione");
            }
            );
            __Microsoft_AspNetCore_Mvc_TagHelpers_OptionTagHelper = CreateTagHelper<global::Microsoft.AspNetCore.Mvc.TagHelpers.OptionTagHelper>();
            __tagHelperExecutionContext.Add(__Microsoft_AspNetCore_Mvc_TagHelpers_OptionTagHelper);
            __Microsoft_AspNetCore_Mvc_TagHelpers_OptionTagHelper.Value = (string)__tagHelperAttribute_0.Value;
            __tagHelperExecutionContext.AddTagHelperAttribute(__tagHelperAttribute_0);
            BeginWriteTagHelperAttribute();
            __tagHelperStringValueBuffer = EndWriteTagHelperAttribute();
            __tagHelperExecutionContext.AddHtmlAttribute("selected", Html.Raw(__tagHelperStringValueBuffer), global::Microsoft.AspNetCore.Razor.TagHelpers.HtmlAttributeValueStyle.Minimized);
            await __tagHelperRunner.RunAsync(__tagHelperExecutionContext);
            if (!__tagHelperExecutionContext.Output.IsContentModified)
            {
                await __tagHelperExecutionContext.SetOutputContentAsync();
            }
            Write(__tagHelperExecutionContext.Output);
            __tagHelperExecutionContext = __tagHelperScopeManager.End();
            WriteLiteral("\r\n                                ");
            __tagHelperExecutionContext = __tagHelperScopeManager.Begin("option", global::Microsoft.AspNetCore.Razor.TagHelpers.TagMode.StartTagAndEndTag, "d6087873297784d7acf20dc3763658b64c20d11923091", async() => {
                WriteLiteral("05 de cada mês");
            }
            );
            __Microsoft_AspNetCore_Mvc_TagHelpers_OptionTagHelper = CreateTagHelper<global::Microsoft.AspNetCore.Mvc.TagHelpers.OptionTagHelper>();
            __tagHelperExecutionContext.Add(__Microsoft_AspNetCore_Mvc_TagHelpers_OptionTagHelper);
            __Microsoft_AspNetCore_Mvc_TagHelpers_OptionTagHelper.Value = (string)__tagHelperAttribute_1.Value;
            __tagHelperExecutionContext.AddTagHelperAttribute(__tagHelperAttribute_1);
            await __tagHelperRunner.RunAsync(__tagHelperExecutionContext);
            if (!__tagHelperExecutionContext.Output.IsContentModified)
            {
                await __tagHelperExecutionContext.SetOutputContentAsync();
            }
            Write(__tagHelperExecutionContext.Output);
            __tagHelperExecutionContext = __tagHelperScopeManager.End();
            WriteLiteral("\r\n                                ");
            __tagHelperExecutionContext = __tagHelperScopeManager.Begin("option", global::Microsoft.AspNetCore.Razor.TagHelpers.TagMode.StartTagAndEndTag, "d6087873297784d7acf20dc3763658b64c20d11924291", async() => {
                WriteLiteral("10 de cada mês");
            }
            );
            __Microsoft_AspNetCore_Mvc_TagHelpers_OptionTagHelper = CreateTagHelper<global::Microsoft.AspNetCore.Mvc.TagHelpers.OptionTagHelper>();
            __tagHelperExecutionContext.Add(__Microsoft_AspNetCore_Mvc_TagHelpers_OptionTagHelper);
            __Microsoft_AspNetCore_Mvc_TagHelpers_OptionTagHelper.Value = (string)__tagHelperAttribute_2.Value;
            __tagHelperExecutionContext.AddTagHelperAttribute(__tagHelperAttribute_2);
            await __tagHelperRunner.RunAsync(__tagHelperExecutionContext);
            if (!__tagHelperExecutionContext.Output.IsContentModified)
            {
                await __tagHelperExecutionContext.SetOutputContentAsync();
            }
            Write(__tagHelperExecutionContext.Output);
            __tagHelperExecutionContext = __tagHelperScopeManager.End();
            WriteLiteral("\r\n                                ");
            __tagHelperExecutionContext = __tagHelperScopeManager.Begin("option", global::Microsoft.AspNetCore.Razor.TagHelpers.TagMode.StartTagAndEndTag, "d6087873297784d7acf20dc3763658b64c20d11925491", async() => {
                WriteLiteral("15 de cada mês");
            }
            );
            __Microsoft_AspNetCore_Mvc_TagHelpers_OptionTagHelper = CreateTagHelper<global::Microsoft.AspNetCore.Mvc.TagHelpers.OptionTagHelper>();
            __tagHelperExecutionContext.Add(__Microsoft_AspNetCore_Mvc_TagHelpers_OptionTagHelper);
            __Microsoft_AspNetCore_Mvc_TagHelpers_OptionTagHelper.Value = (string)__tagHelperAttribute_3.Value;
            __tagHelperExecutionContext.AddTagHelperAttribute(__tagHelperAttribute_3);
            await __tagHelperRunner.RunAsync(__tagHelperExecutionContext);
            if (!__tagHelperExecutionContext.Output.IsContentModified)
            {
                await __tagHelperExecutionContext.SetOutputContentAsync();
            }
            Write(__tagHelperExecutionContext.Output);
            __tagHelperExecutionContext = __tagHelperScopeManager.End();
            WriteLiteral("\r\n                                ");
            __tagHelperExecutionContext = __tagHelperScopeManager.Begin("option", global::Microsoft.AspNetCore.Razor.TagHelpers.TagMode.StartTagAndEndTag, "d6087873297784d7acf20dc3763658b64c20d11926691", async() => {
                WriteLiteral("20 de cada mês");
            }
            );
            __Microsoft_AspNetCore_Mvc_TagHelpers_OptionTagHelper = CreateTagHelper<global::Microsoft.AspNetCore.Mvc.TagHelpers.OptionTagHelper>();
            __tagHelperExecutionContext.Add(__Microsoft_AspNetCore_Mvc_TagHelpers_OptionTagHelper);
            __Microsoft_AspNetCore_Mvc_TagHelpers_OptionTagHelper.Value = (string)__tagHelperAttribute_4.Value;
            __tagHelperExecutionContext.AddTagHelperAttribute(__tagHelperAttribute_4);
            await __tagHelperRunner.RunAsync(__tagHelperExecutionContext);
            if (!__tagHelperExecutionContext.Output.IsContentModified)
            {
                await __tagHelperExecutionContext.SetOutputContentAsync();
            }
            Write(__tagHelperExecutionContext.Output);
            __tagHelperExecutionContext = __tagHelperScopeManager.End();
            WriteLiteral(@"
                            </select>
                        </td>
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
                        <td><input type=""text"" class=""form-control"" id=""complemento"" maxl");
            WriteLiteral(@"ength=""200"" /></td>
                        <td><input type=""text"" class=""form-control"" id=""bairro"" maxlength=""200"" /></td>
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
                        <td><input type=""button"" class=""btn btn-primary"" id=""btnSalvar"" value=""Salvar"" />&nbsp;<input type=""button"" class=""btn btn-danger"" id=""btnCancelar"" value=""Cancelar"" ");
            WriteLiteral("onclick=\"window.location.href = \'/Alunos/Index\'\" /></td>\r\n                    </tr>\r\n                </table>\r\n            </div>\r\n        </div>\r\n    </div>\r\n</section>\r\n\r\n");
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
