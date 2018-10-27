<table class="table">
    <thead>
    <tr>
        <th scope="col">Identificação</th>
        <th scope="col">Nome</th>
        <th scope="col">Descrição</th>
        <th scope="col">Valor Unitário</th>
        <th scope="col">Ações</th>
    </tr>
    </thead>
    <tbody>
    @if(isset($items))
        @foreach($items as $item)
            <tr>
                <th scope="row">#{{ $item->id }}</th>
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