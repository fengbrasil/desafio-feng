var Pedido = (function(){
    "use strict";
    
    var init = function(){
        _load.geral();
    },
    _autoLoading = {
        carregarClientes: function(){
            $.getJSON("/cliente/listartodosclientes", "", function(data){
                $(data).each(function(i, dado){
                    $("#selCliente").append("<option value='" + dado.id + "'>" + dado.nome + "</option>");
                 });
            });
        },
        carregarItem: function(){
            $.getJSON("/item/listartodositem", "", function(data){
                $(data).each(function(i, dado){
                    $("#selItem").append("<option value='" + dado.id + "'>" + dado.nome + "</option>");
                 });
            });
        },
        carregarPedidos: function(){
            $("#tabelaPedidos").DataTable({
                scrollX: true,
                destroy: true,
                searching: false,
                processing: false,
                serverSide: true,
                order: false,
                dom: 'Bfrtip',
                ajax: {
                    url: "api/pedidos/getpedidos",
                    type: "POST",
                    beforeSend: function(){
                        showLoading();
                    },
                    complete: function(){
                        hideLoading();
                    }
                }
            });
        }
    },
    _clickButton = {
        novoPedido: function(){
            $("#btnNovoPedido").click(function(){
                
                $("#hdnNumeroPedido").val("");
                $("#modalNovoPedido").modal("show");
            });
            
        },
        adicionarItem: function(){
            $("#btnAdicionarItem").click(function(){
                var controle = "ok",
                    json = "";
                    
                $("form select").each(function(){
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
                
                json = _configuracoesGerais.efetuarPost("/pedidos/salvarpedido", $("form").serialize());
                json = $.parseJSON(json);
                
                console.log(json.pedido);
                if(Number.isInteger(json.pedido)){
                    alert("Item Inserido");
                    $("#hdnNumeroPedido").val(json.pedido);
                    $("#tabelaPedidos").DataTable().ajax.reload();
                } else {
                    alert("Não é possível inserir duplicar itens no mesmo pedido. Escolha um novo ou faça um novo pedido!");
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
            _autoLoading.carregarClientes();
            _autoLoading.carregarItem();
            _autoLoading.carregarPedidos();
            _clickButton.adicionarItem();
            _clickButton.novoPedido();
        }
    };
    return {
        init: init
    };
})();