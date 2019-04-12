@extends("layouts.layout")
@section("body")
    <script src="{{ asset("../resources/js/produtos.js") }}" type="text/javascript"></script>
    <div class="card border">
        <div class="card-body">
            <h5 class="card-title">Lista de Pedidos</h5>
            <table class="table table-hover table-ordered">
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
                        <div class="form-group">
                            <label for="txtNomeProduto" class="control-label">Nome do Produto</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="txtNomeProduto" placeholder="Nome do Produto" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="txtPrecoProduto" class="control-label">Preço</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="txtPrecoProduto" placeholder="Preço do Produto" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="txtQuantidadeProduto" class="control-label">Quantidade</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="txtQuantidadeProduto" placeholder="Quantidade do Produto" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="txtDepartamentoProduto" class="control-label">Departamento</label>
                            <div class="input-group">
                                <select name="slcDepartamento" id="slcDepartamento" class="form-control">
                                    <option value="" selected>Selecione...</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnSalvar" class="btn btn-sm btn-outline-primary">Salvar</button>
                        <button type="cancel" class="btn btn-sm btn-outline-danger" data-dismiss="modal">Cancelar</button>
                    </div>
                    <input type="hidden" name="hdnRotaCategorias" id="hdnRotaCategorias" value="{{ asset("/api/categorias") }}" />
                    <input type="hidden" name="hdnRotaProduto" id="hdnRotaProduto" value="{{ asset("/api/produtos") }}" />
                    <input type="hidden" name="hdnRotaProduto" id="hdnRotaAllProdutos" value="{{ asset("/produtos") }}" />
                </form>
            </div>
        </div>
    </div>
@endsection