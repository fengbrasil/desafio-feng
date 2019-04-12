@extends("layouts.layout")
@section("body")
    <div class="card border">
        <div class="card-body">
            <h5 class="card-title">Cadastro de Cliente</h5>
            <div class="row">
                <div class="col-sm-4">
                    <form>
                        @csrf
                        <div class="form-group">
                            <label for="txtNome" class="control-label">Nome Completo</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="txtNome" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="txtEmail" class="control-label">Email</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="txtEmail" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="txtTelefone" class="control-label">Telefone</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="txtTelefone" />
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

    <script src="{{ asset("/js/cliente.js") }}" type="text/javascript"></script>
    <script>
        Cliente.init();
    </script>
@endsection