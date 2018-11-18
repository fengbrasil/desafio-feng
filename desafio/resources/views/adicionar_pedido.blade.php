<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Pedidos</title>
    <link rel='stylesheet' href='../css/style.css'>
    <link rel='stylesheet' href='../css/app.css'>
</head>
<body>
    <section class='container'>
        <h1>Novo Pedido</h1>
        <form action="/inserir_pedido" method="post">
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Data</label>
            </div>
            <input type='date' value="{{date('Y-m-d')}}" name='data' class="form-control">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Clientes</label>
            </div>
            <select class="custom-select" id="inputGroupSelect01" name="cliente_id">
            @foreach($clientes as $cliente)
                    <option value="{{$cliente['id']}}" >{{$cliente['nome']}}</option>
                @endforeach
            </select>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Item</label>
            </div>
            <select multiple class="custom-select" id="inputGroupSelect01"  name="produto_id[]">
                @foreach($produtos as $produto)
                    <option value="{{$produto['id']}}">{{$produto['nome']}} -> {{$produto['descricao']}}</option>
                @endforeach
            </select>
        </div>
            <button class='btn btn-success'>Criar Pedido</button>
        </form>
    </section>
</body>
</html>