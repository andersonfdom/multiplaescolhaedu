<%@ Page Title="" Language="C#" MasterPageFile="~/Site1.Master" AutoEventWireup="true" CodeBehind="Usuarios.aspx.cs" Inherits="MultiplaEscolhaEdu.Admin.Usuarios" %>
<asp:Content ID="Content1" ContentPlaceHolderID="head" runat="server">
    <script>
        $(function () {
            var wTotalPaginas = 0;
            var wRotulo = "";
            $("#GridUsuario").DataTable({
                drawCallback: function () {
                    this.api().state.clear();
                    wTotalPaginas = $('.paginate_button:not(.previous,.next)').length;
                    $('.paginate_button', this.api().table().container())
                        .on('click', function () {
                            var wTextoPosicaoPagina = $('.active').text(); // Pega o valor da página selecionada
                            var wPosicaoPagina = 0; // varíavel da posição da página

                            wPosicaoPagina = wTextoPosicaoPagina;

                            wRotulo = "Página " + wPosicaoPagina + " de " + wTotalPaginas + "(total de " + wQtde + " registros)";
                            $('#GridUsuario_info').empty();
                            $('#GridUsuario_info').html(wRotulo);
                        });
                },
                bJQueryUI: true,
                "oLanguage": {
                    "sProcessing": "Processando...",
                    "sLengthMenu": "Mostrar _MENU_ registros",
                    "sZeroRecords": "Não foram encontrados resultados",
                    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando de 0 até 0 de 0 registros",
                    "sInfoFiltered": "",
                    "sInfoPostFix": "",
                    "sSearch": "Procurar:",
                    "sUrl": "",
                    "oPaginate": {
                        "sFirst": "Primeiro",
                        "sPrevious": "Anterior",
                        "sNext": "Próximo",
                        "sLast": "Último"
                    }
                },
                destroy: true,
                searching: true,
                ordering: false,
                dom: 'Bfrtip',
                select: true,
                pageLength: 10
            });

            $('#GridUsuario_paginate').hide();

            $('input[type="search"]').css("width", "950px");
        });

        function ExcluirUsuario(id) {
            if (confirm("Deseja excluir este registro?") == true) {
                var dados = {
                    wId: id
                };

                $.ajax({
                    type: "POST",
                    url: "Usuarios.aspxExcluirUsuario?id=" + id,
                    async: false,
                    dataType: "JSON",
                    contentType: "application/json; charset=UTF-8",
                    success: function (jsonResult) {
                        if (jsonResult == true) {
                            window.location.reload(true);
                        }
                    }
                });
            } else {
                return false;
            }
    }

    function CarregarDadosUsuario(id) {
        window.location.href = 'CadUsuarios.aspx?id=' + id;
    }
    </script>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="body" runat="server">
    <section class="section">
    <h1 class="section-header">
        Usuários do Sistema
    </h1>
    <div class="section-body">
        <div class="table-responsive" style="overflow-x: auto">

            <table id="GridUsuario" class="table" style="width: 100%">
                <thead class="rotuloTable">
                    <tr>
                        <th style="width: 8%"><a alt="Novo Registro" title="Novo Registro" href="CadUsuarios.aspx">+</a></th>
                        <th style="width: 23%">Nome Usuário</th>
                        <th style="width: 23%">Login</th>
                        <th style="width: 23%">Último Acesso</th>
                        <th style="width: 23%">Usuário Logado</th>
                    </tr>
                </thead>
                <tbody id="dadosGridUsuario" class="GridUsuario tablelinhaimp">
                </tbody>
            </table>
        </div>
    </div>
</section>
</asp:Content>
