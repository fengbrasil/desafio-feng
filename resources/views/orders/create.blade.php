@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="text-center text-monospace"><strong>Pedidos</strong></h1>
            </div>
            <div class="col-md-8">
                <form action="{{ route('order.store') }}" method="POST">
                    @include('orders.__form')
                    <div class="form-group">
                        <button class="btn btn-primary" id="storeOrder">Salvar</button>
                        <a href="{{ route('item.index') }}" class="btn btn-link my-3">Voltar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection