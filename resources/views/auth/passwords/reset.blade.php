@extends('layouts.app')
@section('body-class','login-page sidebar-collapse')
@section('content')
<div class="page-header header-filter" style="background-image: url('{{ asset('img/bg2.jpg') }}'); background-size: cover; background-position: top center;"> 
    <div class="main main-raised" style="width: 50%; margin: auto; margin-top: 200px;">
        <div class="container">
            <div class="section">
            <h6 class="label text-center">Nueva contraseña</h6>
            <p></p>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
                {{ csrf_field() }}
                    <input type="hidden" name="token" value="{{ $token }}">
                <div class="row">
                    <div class="col-sm">
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="bmd-label-floating">Correo electrónico</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autocomplete="off">
                                <span class="bmd-help">Escribe el correo electrónico de tu cuenta</span>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="bmd-label-floating">Contraseña</label>
                                <input id="password" type="password" class="form-control" name="password" required>
                                <span class="bmd-help">Escriba una nueva contraseña</span>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="bmd-label-floating">Confirmar contraseña</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                <span class="bmd-help">Repite la nueva contraseña</span>
                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm">
                        <div class="form-group">
                            <button type="submit" class="btn btn-info btn-round btn-sm">
                                Restablecer contraseña
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
</div>
@endsection