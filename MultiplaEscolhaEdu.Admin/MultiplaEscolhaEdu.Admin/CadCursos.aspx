<%@ Page Title="" Language="C#" MasterPageFile="~/Site1.Master" AutoEventWireup="true" CodeBehind="CadCursos.aspx.cs" Inherits="MultiplaEscolhaEdu.Admin.CadCursos" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" runat="server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="body" runat="server">
    <section class="section">
        <h1 class="section-header">Cadastro de Cursos
        </h1>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="dados-cadastrais" role="tabpanel" aria-labelledby="home-tab">
                <div class="table-responsive" style="overflow-x: auto">
                    <table class="table" style="width: 100%">
                        <tr>
                            <th>Categoria</th>
                            <th>
                                <div class="modal fade" id="popCategoria" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="section-header">Categoria dos Cursos
                                                </h4>
                                            </div>
                                            <div class="modal-body">
                                                <table class="table" style="width: 100%">
                                                    <tr>
                                                        <th>Descrição</th>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <asp:TextBox ID="txtDescricaoCategoria" runat="server" CssClass="form-control" />
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="modal-footer">
                                                <table class="table" style="width: 100%">
                                                    <tr>
                                                        <td>
                                                            <asp:Button CssClass="btn btn-primary" ID="btnSalvarCategoria" Text="Salvar" runat="server" OnClick="btnSalvarCategoria_Click" />
                                                            <input type="button" id="btnCancelarCategoria" value="Cancelar" class="btn btn-danger" onclick="$('#popCategoria').modal('hide')" />
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
                                <asp:DropDownList ID="ddlCategoria" runat="server" CssClass="form-control">
                                </asp:DropDownList>
                            </td>
                            <td>
                                <input type="button" class="btn btn-primary" id="btnCadastrar" value="Cadastrar" data-toggle="modal" data-target="#popCategoria" data-backdrop="" />
                            </td>
                        </tr>
                    </table>
                    <table class="table" style="width: 100%">
                        <tr>
                            <th>Descrição</th>
                            <th>Valor</th>
                        </tr>
                        <tr>
                            <td>
                                <asp:HiddenField ID="hdnCursoId" runat="server" Value="0" />
                                <asp:TextBox ID="txtDescricaoCurso" runat="server" CssClass="form-control" />
                            </td>
                            <td>
                                <asp:TextBox ID="txtValorCurso" runat="server" CssClass="form-control moeda" />
                            </td>
                        </tr>
                    </table>
                    <table class="table" style="width: 100%">
                        <tr>
                            <th>Slug</th>
                        </tr>
                        <tr>
                            <td><asp:TextBox ID="txtSlug" runat="server" CssClass="form-control" /></td>
                        </tr>
                    </table>
                    <table class="table" style="width: 100%">
                        <tr>
                            <td>
                                <asp:Button CssClass="btn btn-primary" ID="btnSalvarCurso" Text="Salvar" runat="server" OnClick="btnSalvarCurso_Click" />
                                <input type="button" id="btnCancelarCurso" value="Cancelar" class="btn btn-danger" onclick="window.location.href = 'Cursos.aspx'" />
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </section>
</asp:Content>
