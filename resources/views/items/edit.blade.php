@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="text-center text-monospace">
                    <strong>Itens</strong>
                    <br>
                    ({{ $item->name }})
                </h1>
            </div>
            <div class="col-md-8">
                <form action="{{ route('item.update',['item'=>$item->id]) }}" method="POST">
                    @method('PUT')
                    @csrf
                    @include('items.__form')
                    <div class="form-group">
                        <button class="btn btn-primary">Atualizar</button>
                        <a href="{{ route('item.index') }}" class="btn btn-link my-3">Voltar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection