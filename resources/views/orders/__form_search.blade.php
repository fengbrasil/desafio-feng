<form action="{{ route('order.index') }}" class="form">
    <div class="row d-flex align-items-end">

        <div class="form-group col-3">
            <label for="startAt">Data de Inicio:</label>
            <input type="date" class="form-control" id="startAt" name="startAt"  value="{{ $params['startAt'] ?? "" }}">
        </div>
        <div class="form-group col-3 pl-0">
            <label for="endAt">Data de Término:</label>
            <input type="date" class="form-control" id="endAt" name="endAt"  value="{{ $params['endAt'] ?? "" }}">
        </div>
        <div class="form-group col-2 px-0">
            <label for="by">Nome do Cliente:</label>
            <input type="text" class="form-control" id="by" name="by"  value="{{ $params['by'] ?? "" }}">
        </div>
        <div class="form-group col-2 pr-0">
            <label for="vlMin">Valor Minimo:</label>
            <input type="text" class="form-control" id="vlMin" name="vlMin"  value="{{ $params['vlMin'] ?? "" }}">
        </div>
        <div class="form-group col-2">
            <button class="btn btn-primary">Search</button>
        </div>
    </div>
</form>
