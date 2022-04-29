<%@ Page Title="" Language="C#" MasterPageFile="~/Site1.Master" AutoEventWireup="true" CodeBehind="CadParceiros.aspx.cs" Inherits="MultiplaEscolhaEdu.Admin.CadParceiros" %>
<asp:Content ID="Content1" ContentPlaceHolderID="head" runat="server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="body" runat="server">
     <section class="section">
        <h1 class="section-header">Cadastro de Parceiros
        </h1>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="dados-cadastrais" role="tabpanel" aria-labelledby="home-tab">
                <div class="table-responsive" style="overflow-x: auto">
                    <table class="table" style="width: 100%">
                        <tr>
                            <th>Nome Completo</th>
                        </tr>
                        <tr>
                            <td>
                                <asp:TextBox ID="txtNomeCompleto" runat="server" CssClass="form-control" />
                            </td>
                        </tr>
                    </table>
                    <table class="table" style="width: 100%">
                        <tr>
                            <th>WhatsApp</th>
                            <th>E-mail</th>
                        </tr>
                        <tr>
                            <td> <asp:TextBox ID="txtWhatsApp" runat="server" CssClass="form-control" /></td>
                            <td> <asp:TextBox ID="txtEmail" runat="server" TextMode="Email" CssClass="form-control" /></td>
                        </tr>
                    </table>
                     <table class="table" style="width: 100%">
                        <tr>
                            <th>Cep</th>
                            <th>Logradouro</th>
                        </tr>
                        <tr>
                            <td> <asp:TextBox ID="txtCep" runat="server" CssClass="form-control" Width="30%" /></td>
                            <td> <asp:TextBox ID="txtLogradouro" runat="server" CssClass="form-control"/></td>
                        </tr>
                    </table>
                     <table class="table" style="width: 100%">
                        <tr>
                            <th>Complemento</th>
                            <th>Bairro</th>
                        </tr>
                        <tr>
                            <td> <asp:TextBox ID="txtComplemento" runat="server" CssClass="form-control" /></td>
                            <td> <asp:TextBox ID="txtBairro" runat="server" CssClass="form-control" /></td>
                        </tr>
                    </table>
                     <table class="table" style="width: 100%">
                        <tr>
                            <th>Cidade</th>
                            <th>Estado</th>
                        </tr>
                        <tr>
                            <td> <asp:TextBox ID="txtCidade" runat="server" CssClass="form-control" /></td>
                            <td> <asp:TextBox ID="txtEstado" runat="server" CssClass="form-control" /></td>
                        </tr>
                    </table>  
                    <table class="table" style="width: 100%">
                        <tr>
                            <td>
                                <asp:Button CssClass="btn btn-primary" ID="btnSalvarParceiro" Text="Salvar" runat="server" OnClick="btnSalvarParceiro_Click" />
                                <input type="button" id="btnCancelarParceiro" value="Cancelar" class="btn btn-danger" onclick="window.location.href = 'Parceiros.aspx'" />
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </section>
</asp:Content>
