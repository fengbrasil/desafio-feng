@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="text-center text-monospace">
                    <strong>Cliente</strong>
                    <br>
                    ({{ $client->name }})
                </h1>
            </div>
            <div class="col-md-8">
                <form action="{{ route('client.update',['client'=>$client->id]) }}" method="POST">
                    @method('PUT')
                    @csrf
                    @include('clients.__form')
                    <div class="form-group">
                        <button class="btn btn-primary">Atualizar</button>
                        <a href="{{ route('client.index') }}" class="btn btn-link my-3">Voltar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection