$(function () {
    $('.cpf').mask('000.000.000-00');
    $('.cnpj').mask('00.000.000/0000-00');
    $('.celular').mask('(00)0 0000-0000');
    $('.telefone').mask('(00)0000-0000');
    $('.rg').mask('00.000.000-0');
    $('.cep').mask('00.000-000');
    CKEDITOR.replaceClass = 'ckeditor';
});