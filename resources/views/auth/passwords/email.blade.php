@extends('layouts.app')
@section('title','Sbar, no esperes más!')
@section('body-class','login-page sidebar-collapse')
@section('content')
<div class="page-header header-filter" style="background-image: url('{{ asset('img/bg2.jpg') }}'); background-size: cover; background-position: top center;">
<div class="main main-raised" style="width: 50%; margin: auto; margin-top: 200px;">
    <div class="container">
        <div class="section">
        <h6 class="label text-center">Restablecer contraseña</h6>
            <p></p>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                {{ csrf_field() }}
                    <div class="row">
                        <div class="col-sm">
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="bmd-label-floating">Correo electrónico</label>
                                <input id="email" autocomplete="off" type="email" class="form-control" name="email" required>
                                <span class="bmd-help">Escriba el correo con el que creó su cuenta</span>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <br>
                            <div class="form-group">
                                    <button type="submit" class="btn btn-info btn-round btn-sm">
                                        Enviar enlace de restablecimiento de contraseña
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
