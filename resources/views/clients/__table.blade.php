<table class="table">
    <thead>
    <tr>
        <th scope="col">Identificação</th>
        <th scope="col">Nome</th>
        <th scope="col">Email</th>
        <th scope="col">Telefone</th>
        <th scope="col">Ações</th>
    </tr>
    </thead>
    <tbody>
    @foreach($clients as $client)
        <tr>
            <th scope="row">#{{ $client->id }}</th>
            <td>{{ $client->name }}</td>
            <td>{{ $client->email }}</td>
            <td>{{ $client->phone }}</td>
            <td>
                <a href="{{ route('client.edit',['client'=>$client->id]) }}">Editar</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>