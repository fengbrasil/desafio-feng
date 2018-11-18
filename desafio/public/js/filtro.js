var nome    = $('.nome-cliente');
var valor   = $('.valor-minimo');
var inicio  = $('.data-inicio');
var termino = $('.data-termino');

$('#data-inicio').blur(function(){
    if($('#data-inicio').val() != ''){
        inicio.each(function(index){
            var d1 = Date.parse($('#data-inicio').val());
            var d2 = Date.parse($(this).text());
            //alert($('#data-inicio').val());
            if (d1 > d2) {
                $(this).parent().hide();
            }
                
        });
    }else{
        valor.each(function(index){
            if($(this).text().toLowerCase() != $('#data-inicio').val().toLowerCase())
                $(this).parent().show();
        });        
    }
});

$('#data-termino').blur(function(){
    if($('#data-termino').val() != ''){
        inicio.each(function(index){
            var d1 = Date.parse($('#data-termino').val());
            var d2 = Date.parse($(this).text());
            if (d1 < d2) {
                $(this).parent().hide();
            }
                
        });
    }else{
        valor.each(function(index){
            if($(this).text().toLowerCase() != $('#data-inicio').val().toLowerCase())
                $(this).parent().show();
        });        
    }
});

$('#nome-cliente').blur(function(){
    if($('#nome-cliente').val() != ''){
        nome.each(function(index){
            if($(this).text().toLowerCase() != $('#nome-cliente').val().toLowerCase())
                $(this).parent().hide();
        });
    }else{
        nome.each(function(index){
            if($(this).text().toLowerCase() != $('#nome-cliente').val().toLowerCase())
                $(this).parent().show();
        });        
    }
});

$('#valor-minimo').blur(function(){
    if($('#valor-minimo').val() != ''){
        valor.each(function(index){
            if(parseFloat($(this).text()) < parseFloat($('#valor-minimo').val()))
                $(this).parent().hide();
        });
    }else{
        valor.each(function(index){
            if($(this).text().toLowerCase() != $('#valor-minimo').val().toLowerCase())
                $(this).parent().show();
        });        
    }
});
