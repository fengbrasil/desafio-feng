@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="text-center text-monospace"><strong>Itens</strong></h1>
            </div>
            <div class="col-md-8">
                <form action="{{ route('item.store') }}" method="POST">
                    @csrf
                    @include('items.__form')
                    <div class="form-group">
                        <button class="btn btn-primary">Salvar</button>
                        <a href="{{ route('item.index') }}" class="btn btn-link my-3">Voltar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection