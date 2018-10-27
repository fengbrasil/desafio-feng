<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">Identificação</th>
            <th scope="col">Data do Pedido</th>
            <th scope="col">Valor</th>
            <th scope="col">Cliente</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
            <tr>
                <th scope="row">#{{ $order->id }}</th>
                <td>{{ $order->dt_order->format('d/m/Y') }}</td>
                <td>R$ 00,00</td>
                <td>{{ $order->client->name }}</td>
            </tr>
        @endforeach
    </tbody>
</table>