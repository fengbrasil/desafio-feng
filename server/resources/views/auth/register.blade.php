@extends('layouts.app')

@section('main')
<div class="row">
  <div class="col s12">
    <h1 class="m-3">Registrar</h1>
    <form class="card" method="post" action="{{ route('register') }}">
      @csrf
      <div class="card-content">
        <div class="row">
          <div class="input-field col s12">
            <input id="name" class="validate {{ $errors->has('name') ? 'invalid' : '' }}" type="text" name="name" required>
            <label for="name">Nome</label>
            @if($errors->has('name'))
              <span class="validation-feedback text-red text-sm">
                {{ $errors->first('name') }}
              </span>
            @endif
          </div>
          <div class="input-field col s12">
            <input id="telephone" class="telephone validate {{ $errors->has('telephone') ? 'invalid' : '' }}" type="text" name="telephone" required>
            <label for="telephone">Telephone</label>
            @if($errors->has('telephone'))
              <span class="validation-feedback text-red text-sm">
                {{ $errors->first('telephone') }}
              </span>
            @endif
          </div>
          <div class="input-field col s12">
            <input id="email" class="validate {{ $errors->has('email') ? 'invalid' : '' }}" type="email" name="email" required>
            <label for="email">E-mail</label>
            @if($errors->has('email'))
              <span class="validation-feedback text-red text-sm">
                {{ $errors->first('email') }}
              </span>
            @endif
          </div>
          <div class="input-field col s12">
            <input id="password" class="validate {{ $errors->has('password') ? 'invalid' : '' }}" type="password" name="password" required>
            <label for="password">Senha</label>
            @if($errors->has('password'))
              <span class="validation-feedback text-red text-sm">
                {{ $errors->first('password') }}
              </span>
            @endif
          </div>
          <div class="input-field col s12">
            <input id="password_confirmation" class="validate" type="password" name="password_confirmation">
            <label for="password_confirmation">Confirme a senha</label>
          </div>
        </div>
      </div>
      <div class="card-action">
        <button class="btn waves-effect waves-light" type="submit">
          Registrar
        </button>
      </div>
    </form>
  </div>
</div>
@endsection
