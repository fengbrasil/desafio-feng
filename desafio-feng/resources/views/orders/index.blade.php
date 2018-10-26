@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-8">
                <h1 class="text-center text-monospace"><strong>Pedidos</strong></h1>
                <a href="{{ route('order.create') }}" class="btn btn-primary my-3">Novo</a>
            </div>

            <div class="col-md-8">
                @include('orders.__table')
            </div>

        </div>
    </div>
@endsection