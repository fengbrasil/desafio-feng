<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Pedidos</title>
    <link rel='stylesheet' href='../css/style.css'>
    <link rel='stylesheet' href='../css/app.css'>
</head>
<body>
    <div class='titulo-pedido'><h1>Detalhes do Pedido #{{$pedido['id']}}</h1></div>
    <section class='dados-cliente'>
        <div>Nome: {{$cliente->nome}}</div>
        <div>Telefone: {{$cliente->telefone}}</div>
        <div>E-mail: {{$cliente->email}}</div>
    </section>

    <section class='detalhes-pedido'>
        <table class="table table-bordered"> 
            <thead>
                <th>Produto</th>
                <th>Descrição</th>
                <th>Valor</th>
            </thead>
            <tbody>
                @foreach($produtos as $p)
                <tr>
                    <td> {{ $p['nome'] }} </td>
                    <td> {{ $p['descricao'] }} </td>
                    <td> {{ $p['valor_unitario'] }} </td>
                </tr>
                @endforeach
                <tr>
                    <td colspan=2></td>
                    <td>Total: {{ $total }}</td>
                </tr>
            </tbody>
        </table>
    </section>
</body>
</html>