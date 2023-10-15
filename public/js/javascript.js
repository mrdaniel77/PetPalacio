$(document).ready(function () {
    $('#cpf').mask('000.000.000-00');
    $('#telefone').mask(" (00) 00000-0000");
    $('#preco').mask('99990,00', {reverse:true});
})