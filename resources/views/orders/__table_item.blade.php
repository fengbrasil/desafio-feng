<table class="table">
    <thead>
    <tr>
        <th scope="col">Nome</th>
        <th scope="col">Quantidade</th>
        <th scope="col">Valor Unitário</th>
        <th scope="col">Valor Total</th>
    </tr>
    </thead>
    <tbody id="tableItems">
    @if(isset($order->items))
        @foreach($order->items as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->description }}</td>
                <td>R$ {{ number_format($item->vl_unitary,2,',','') }}</td>
                <td>
                    <a href="{{ route('item.edit',[$item->id]) }}">Editar</a>
                </td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>