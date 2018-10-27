<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
<div class="form-group">
    <label for="dt_order">Data:</label>
    <input type="date" class="form-control" id="dt_order" name="dt_order"  value="{{ now()->format('Y-m-d') }}">
</div>

<div class="form-group">
    <label for="client_id">Cliente:</label>
    <select name="client_id" id="client_id" class="form-control">
        <option value="">Selecione...</option>
        @foreach($clients as $client)
            <option value="{{ $client->id }}">{{ $client->name }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <div class="row">
        <div class="col-md-8">
            <label for="item_id">Item:</label>
            <select name="item_id" id="item_id" class="form-control">
                <option value="">Selecione...</option>
                @foreach($items as $item)
                    <option value="{{ $item }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <label for="amount">Quantidade:</label>
            <input type="text" class="form-control" id="amount" name="amount"  value="" placeholder="0">
        </div>
        <div class="col-md-1 d-flex align-items-end">
            <button type="button" id="addItem" class="btn btn-outline-success"><strong>+</strong></button>
        </div>
    </div>
</div>
<h3 class="text-center text-monospace my-5">Itens Adicionados</h3>
@include('orders.__table_item')



