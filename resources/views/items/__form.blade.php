<div class="form-group">
    <label for="name">Nome:</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Informe o nome..." value="{{ $item->name ?? "" }}">
</div>

<div class="form-group">
    <label for="description">Descrição:</label>
    <input type="text" class="form-control" id="description" name="description" placeholder="Informe uma descrição..." value="{{ $item->description ?? "" }}">
</div>

<div class="form-group">
    <label for="vl_unitary">Valor Unitário:</label>
    <input type="text" class="form-control" id="vl_unitary" name="vl_unitary" placeholder="" value="{{ $item->vl_unitary ?? "0,0" }}">
</div>

