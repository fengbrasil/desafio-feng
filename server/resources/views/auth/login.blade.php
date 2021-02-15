@extends('layouts.app')

@section('main')
<div class="row">
  <div class="col s12">
    <h1 class="m-3">Entrar</h1>
    <form class="card" method="post" action="{{ route('login') }}">
      @csrf
      <div class="card-content">
        <div class="row">
          <div class="input-field col s12">
            <input id="email" type="email" class="validate {{ $errors->has('email') ? 'invalid' : '' }}" name="email" value="{{ old('email') }}" required>
            <label for="email">E-mail</label>
            @if($errors->has('email'))
              <span class="validation-feedback text-red text-sm">
                {{ $errors->first('email') }}
              </span>
            @endif
          </div>
          <div class="input-field col s12">
            <input id="password" type="password" class="validate {{ $errors->has('password') ? 'invalid' : '' }}" name="password" required>
            <label for="password">Senha</label>
            @if($errors->has('password'))
              <span class="validation-feedback text-red text-sm">
                {{ $errors->first('password') }}
              </span>
            @endif
          </div>
        </div>
        {{-- <a href="#">Esqueci a senha</a> --}}
      </div>
      <div class="card-action">
        <button class="btn waves-effect waves-light" type="submit">
          Entrar
        </button>
      </div>
    </form>
  </div>
</div>
@endsection
