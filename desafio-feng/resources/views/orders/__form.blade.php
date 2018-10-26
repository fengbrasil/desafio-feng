<div class="form-group">
    <label for="name">Nome:</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Informe o nome..." value="{{ $item->name ?? "" }}">
</div>

<div class="form-group">
    <label for="description">Cliente:</label>
    <select name="" id="" class="form-control">
        <option value="">Selecione...</option>
        @foreach($clients as $client)
            <option value="{{ $client->id }}">{{ $client->name }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <div class="row">
        <div class="col-md-8">
            <label for="description">Cliente:</label>
            <select name="" id="" class="form-control">
                <option value="">Selecione...</option>
                @foreach($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <label for="amount">Quantidade:</label>
            <input type="text" class="form-control" id="amount" name="amount"  value="{{ $item->name ?? "" }}">
        </div>
        <div class="col-md-1 d-flex align-items-end">
            <button class="btn btn-outline-success"><strong>+</strong></button>
        </div>
    </div>
</div>
<h3 class="text-center text-monospace my-5">Itens Adicionados</h3>
@include('items.__table')



