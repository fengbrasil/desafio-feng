@extends("layouts.layout")
@section("body")
    <div class="card border">
        <div class="card-body">
            <h5 class="card-title">Lista de Pedidos</h5>
            <table id="tabelaPedidos" class="table table-sm table-striped table-bordered table-hover nowrap w-100">
                <thead>
                    <tr>
                        <th>Identificação</th>
                        <th>Data do Pedido</th>
                        <th>Valor</th>
                        <th>Cliente</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <button id="btnNovoPedido" class="btn btn-sm btn-outline-primary">
                <i class="material-icons vertical-align-middle md-17">create</i> Novo Pedido
            </button>
        </div>
    </div>
    
    <div class="modal fade" id="modalNovoPedido" tabindex="-1" role="dialog" aria-labelledby="modalNovoPedidoLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form class="form-horizontal">
                    <div class="modal-header">
                        <h5 class="modal-title">Novo Pedido</h5>
                    </div>
                    <div class="modal-body">
                            @csrf
                            <div class="form-group">
                                <label for="selCliente" class="control-label">Cliente</label>
                                <div class="input-group">
                                    <select name="selCliente" id="selCliente" class="form-control form-control-sm">
                                        <option value="" selected>Selecione...</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="selItem" class="control-label">Item do Pedido</label>
                                <div class="input-group">
                                    <select name="selItem" id="selItem" class="form-control form-control-sm">
                                        <option value="" selected>Selecione...</option>
                                    </select>
                                </div>
                            </div>
                            
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnAdicionarItem" class="btn btn-sm btn-outline-primary">Adicionar</button>
                        <button type="cancel" class="btn btn-sm btn-outline-danger" data-dismiss="modal">Fechar</button>
                    </div>
                    <input type="hidden" name="hdnNumeroPedido" id="hdnNumeroPedido" value="" />
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset("/js/pedidos.js") }}" type="text/javascript"></script>
    <script>
        Pedido.init();
    </script>
@endsection