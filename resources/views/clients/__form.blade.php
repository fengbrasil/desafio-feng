<div class="form-group">
    <label for="name">Nome:</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Informe o nome..." value="{{ $client->name ?? "" }}">
</div>

<div class="form-group">
    <label for="email">E-mail:</label>
    <input type="text" class="form-control" id="email" name="email" placeholder="Informe um e-mail..." value="{{ $client->email ?? "" }}">
</div>

<div class="form-group">
    <label for="phone">Telefone:</label>
    <input type="text" class="form-control" id="phone" name="phone" placeholder="( )xxxxx-xxxx" value="{{ $client->phone ?? "" }}">
</div>

