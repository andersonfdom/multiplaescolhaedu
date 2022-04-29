<%@ Page Title="" Language="C#" MasterPageFile="~/Site1.Master" AutoEventWireup="true" CodeBehind="Default.aspx.cs" Inherits="MultiplaEscolhaEdu.Admin.Default" %>
<asp:Content ID="Content1" ContentPlaceHolderID="head" runat="server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="body" runat="server">
    <h1 class="section-header">
    <label>Dashboard</label>
</h1>
<div class="row">
    <div class="col-lg-3 col-md-6 col-12">
        <div class="card card-sm-3">
            <div class="card-icon bg-primary">
                <i class="ion ion-person"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Cursos Cadastrados</h4>
                </div>
                <div id="dvQuantidadeCursos" runat="server" class="card-body">
                    
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-12">
        <div class="card card-sm-3">
            <div class="card-icon bg-danger">
                <i class="ion ion-ios-paper-outline"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Alunos Cadastrados</h4>
                </div>
                <div id="dvQuantidadeAlunos" runat="server"  class="card-body">
                    
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-12">
        <div class="card card-sm-3">
            <div class="card-icon bg-warning">
                <i class="ion ion-paper-airplane"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Parceiros Cadastrados</h4>
                </div>
                <div id="dvQuantidadeParceiros" runat="server" class="card-body">
                   
                </div>
            </div>
        </div>
    </div>
</div>
</asp:Content>
