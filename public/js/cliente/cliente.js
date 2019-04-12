var Cliente = (function(){
    "use strict";
    
    var init = function(){
        _load.geral();
    },
    _clickButton = {
        salvar: function(){
            $("#btnSalvar").click(function(){
                var controle = "ok",
                    json = "";
                    
                $("form input").each(function(){
                    if($(this).val() == ""){
                        controle = "nok"
                        $(this).addClass("border border-danger");
                    } else {
                     $(this).removeClass("border border-danger");   
                    }
                });
                
                if(controle == "nok"){
                    alert("Preeencha todos os campos");
                    
                    return false;
                }
                
                json = _configuracoesGerais.efetuarPost("/cliente/salvarcliente", $("form").serialize());
                json = $.parseJSON(json);
                
                if(json.retorno = "sucesso"){
                    $("form input").val("");
                    alert("Cliente gravado");
                }
            });
        }
    },
    _configuracoesGerais = {
        efetuarPost: function(url, parametros){
            var json;
            
            $.ajax({
                url: url,
                data: parametros,
                beforeSend: function(){
                },
                type: "POST",
                async: false,
                success: function(data){
                    json = data;
                    hideLoading();
                    return false;
                }
            });
            
            return json;
        }
    },
    _load = {
        geral: function(){
            _clickButton.salvar();
        }
    };
    return {
        init: init
    };
})();