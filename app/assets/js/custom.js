$(document).ready(function () {
    $('.sidebar-menu').tree()
});

var maskBehavior = function (val) {
    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
},  options = {onKeyPress: function(val, e, field, options) {
    field.mask(maskBehavior.apply({}, arguments), options);
    }
};

$('.phone').mask(maskBehavior, options);

$(function() {
    $('.money').maskMoney();
})

$(function() {
    $(".globalDtTable").DataTable({
        "language": {
            "sEmptyTable": "Nenhum registro encontrado",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "_MENU_ resultados por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "Pesquisar",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
            "oAria": {
                "sSortAscending": ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
            },
            
        },
        
        "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "TODOS"]],

        "aaSorting": [[0, "asc"], [0, null]],

        stateSave: true,
        
    });
});

function deleteClient(idclient)
{
    var r = confirm("Tem certeza que deseja Excluir esse cliente?");
    if (r == true) {
        location.href = '/clientes/apagar/'+idclient
    }
}
function deleteProduct(idproduct)
{
    var r = confirm("Tem certeza que deseja Excluir esse produto?");
    if (r == true) {
        location.href = '/produtos/apagar/'+idproduct
    }
}