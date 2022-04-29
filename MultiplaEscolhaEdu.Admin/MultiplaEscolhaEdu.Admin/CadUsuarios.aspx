<%@ Page Title="" Language="C#" MasterPageFile="~/Site1.Master" AutoEventWireup="true" CodeBehind="CadUsuarios.aspx.cs" Inherits="MultiplaEscolhaEdu.Admin.CadUsuarios" %>
<asp:Content ID="Content1" ContentPlaceHolderID="head" runat="server">
    <script>
    function GravarUsuario() {
        var dados = new FormData();

        dados.append("Id", $('#IdUsuario').val());
        dados.append("LoginUsuario", $('#LoginUsuario').val());
        dados.append("Senha", , $('#Senha').val());
        dados.append("Datacadastro", null);
        dados.append("Ultimoacesso", null);
        dados.append("Nomeusuario", $('#NomeUsuario').val());
        dados.append("Usuariologado", null);

        $.ajax(
            {
                url: "CadUsuarios.aspx/GravarUsuario",
                data: dados,
                processData: false,
                contentType: false,
                type: "POST",
                success: function (data) {
                    window.location.href = "Usuarios.aspx";
                }
            }
        );
    }
    </script>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="body" runat="server">
    <section class="section">
    <h1 class="section-header">
        Dados Usuário
    </h1>
    <div class="section-body">
        <div class="table-responsive" style="overflow-x: auto">
            <input type="hidden" id="IdUsuario" value="@Model.Id" />
            <table class="table" style="width: 100%">
                <tr>
                    <th>Nome Usuário</th>
                    <th>Login</th>
                </tr>
                <tr>
                    <td><input type="text" id="NomeUsuario" name="NomeUsuario" class="form-control" /></td>
                    <td><input type="text" id="LoginUsuario" name="LoginUsuario" class="form-control" /></td>
                </tr>
            </table>
            <table class="table" style="width: 100%">
                <tr>
                    <th>Senha</th>
                    <th>Confirmar Senha</th>
                </tr>
                <tr>
                    <td><input type="password" id="Senha" name="Senha"  class="form-control" /></td>
                    <td><input type="password" id="ConfirmarSenha" name="ConfirmarSenha" class="form-control" /></td>
                </tr>
            </table>
            <table class="table" style="width:100%">
                <tr>
                    <td>
                        <input type="button" class="btn btn-primary" id="btnSalvar" value="Salvar" onclick="GravarUsuario();" />
                        <input type="button" id="btnCancelar" value="Cancelar" class="btn btn-danger" onclick="window.location.href = 'Usuarios.aspx'" />
                    </td>
                </tr>
            </table>
        </div>
    </div>
</section>
</asp:Content>
