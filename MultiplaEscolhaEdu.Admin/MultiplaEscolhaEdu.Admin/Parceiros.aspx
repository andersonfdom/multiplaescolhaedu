﻿<%@ Page Title="" Language="C#" MasterPageFile="~/Site1.Master" AutoEventWireup="true" CodeBehind="Parceiros.aspx.cs" Inherits="MultiplaEscolhaEdu.Admin.Parceiros" %>
<asp:Content ID="Content1" ContentPlaceHolderID="head" runat="server">
    <script>
        $(function () {
            var wTotalPaginas = 0;
            var wRotulo = "";
            $("#GridParceiros").DataTable({
                drawCallback: function () {
                    this.api().state.clear();
                    wTotalPaginas = $('.paginate_button:not(.previous,.next)').length;
                    $('.paginate_button', this.api().table().container())
                        .on('click', function () {
                            var wTextoPosicaoPagina = $('.active').text(); // Pega o valor da página selecionada
                            var wPosicaoPagina = 0; // varíavel da posição da página

                            wPosicaoPagina = wTextoPosicaoPagina;

                            wRotulo = "Página " + wPosicaoPagina + " de " + wTotalPaginas + "(total de " + wQtde + " registros)";
                            $('#GridParceiros_info').empty();
                            $('#GridParceiros_info').html(wRotulo);
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

            $('#GridParceiros_paginate').hide();

            $('input[type="search"]').css("width", "950px");
        });

        function CarregarDadosParceiro(Id) {
            window.location.href = "CadParceiros.aspx?Id=" + Id;
        }

        function ExcluirDadosParceiro(Id) {
            if (confirm("Deseja excluir este registro?") == true) {
                var dados = {
                    wId: Id
                };

                $.ajax({
                    type: "POST",
                    url: "Parceiros.aspx/ExcluirParceiros",
                    async: false,
                    dataType: "JSON",
                    data: JSON.stringify(dados),
                    contentType: "application/json; charset=UTF-8",
                    success: function (jsonResult) {
                        if (jsonResult.d == '') {
                            window.location.reload(true);
                        } else {
                            alert(jsonResult.d);
                        }
                    }
                });
            } else {
                return false;
            }
        }
    </script>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="body" runat="server">
    <section class="section">
    <h1 class="section-header">
        Lista de Parceiros
    </h1>
    <div class="section-body">
        <div class="table-responsive" style="overflow-x: auto">
            <table id="GridParceiros" class="table" style="width: 100%">
                <thead class="rotuloTable">
                    <tr>
                        <th style="width: 8%"><a href="CadParceiros.aspx" title="Novo Registro">+</a></th>
                        <th style="width: 25%">Nome</th>
                        <th style="width: 25%">E-mail</th>
                        <th style="width: 10%">WhatsApp</th>
                        <th style="width: 20%">Cidade</th>
                        <th style="width: 12%">Estado</th>
                    </tr>
                </thead>
                <tbody id="dadosGridParceiros" runat="server" class="GridParceiros tablelinhaimp">
                </tbody>
            </table>
        </div>
    </div>
</section>
</asp:Content>
