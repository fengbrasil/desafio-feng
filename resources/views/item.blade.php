@extends("layouts.layout")
@section("body")
    <div class="card border">
        <div class="card-body">
            <h5 class="card-title">Cadastro de Itens</h5>
            <div class="row">
                <div class="col-sm-4">
                    <form>
                        @csrf
                        <div class="form-group">
                            <label for="txtNome" class="control-label">Nome do Produto</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="txtNome" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="txtDescricao" class="control-label">Descrição</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="txtDescricao" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="txtValor" class="control-label">Valor R$</label>
                            <div class="input-group">
                                <input id="txtValor" type="text" class="form-control" name="txtValor" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button id="btnSalvar" class="btn btn-sm btn-outline-primary">
                <i class="material-icons vertical-align-middle md-17">check</i> Salvar
            </button>
        </div>
    </div>
        <script src="{{ asset("/js/item.js") }}" type="text/javascript"></script>
    <script>
        Item.init();
    </script>
@endsection