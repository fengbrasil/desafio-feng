<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Pedidos</title>
    <link rel='stylesheet' href='css/style.css'>
    <link rel='stylesheet' href='css/app.css'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <section class='bem-vindo-usuario'>
        Bem vindo, {{$usuario->name}}
    </section>
    <section class='filtro'>
        <div>
            <label for="data-inicio">Data de Início</label>
            <input type='date' id='data-inicio' class="form-control">
        </div>
        <div>
            <label for="data-termino">Data de Término</label>
            <input type='date' id='data-termino' class="form-control">
        </div>
        <div>
            <label for="nome-cliente">Nome do Cliente</label>
            <input type='text' id='nome-cliente' class="form-control">
        </div>
        <div>
            <label for="valor-minimo">Valor Mínimo</label>
            <input type='text' id='valor-minimo' class="form-control">
        </div>
    </section>

    <section class='tabela-pedidos'>
    
        <table class="table table-bordered">
            <thead>
                <tr>
                <th>Identificação</th>
                <th>Data do Pedido</th>
                <th>Valor</th>
                <th>Cliente</th>
                </tr>
            </thead>
            <tbody>
            @foreach($pedidos as $key=>$pedido)
                <tr>
                    <td><a href="pedidos/{{ $pedido['id'] }}">#{{ $pedido['id'] }}</a></td>
                    <td class='data-inicio'>{{ $pedido['data'] }}</td>
                    <td class='valor-minimo'>{{ $pedido['valor'] }}</td>
                    <td class='nome-cliente'>{{ $clientes[$key]['nome'] }}</td>
                </tr>     
            @endforeach
            </tbody>
        </table>
        <a href='/adicionar/pedido' class='btn btn-success botao-add-pedido'>Adicionar Pedido</a>
    </section>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src='js/filtro.js'></script>
</body>
</html>