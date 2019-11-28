@extends('layouts.app')
@section('title','Sbar, no esperes más!')
@section('body-class','login-page sidebar-collapse')
@section('content')
<div class="page-header header-filter" style="background-image: url('{{ asset('img/bg_4.jpg') }}'); background-size: cover; background-position: top center;">
<div class="main main-raised" style="width: 400px; margin: auto; margin-top: 100px;">
    <div class="container">
        <div class="section">
                <h6 class="label text-center">Restablecer contraseña</h6>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                {{ csrf_field() }}
                    <div class="row">
                        <div class="col-10" style="margin: auto;">
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
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-11" style="margin: auto;">
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
    <footer class="footer">
      <div class="container">
        <nav class="float-left">
          <ul>
            <li>
              <a href="">
                Desarrolladores
              </a>
            </li>
            <li>
              <a href="">
                Nosotros
              </a>
            </li>
            <li>
              <a href="#">
                Preguntas frecuentes
              </a>
            </li>
            <li>
              <a href="">
                Termino y condiciones
              </a>
            </li>
          </ul>
        </nav>
        <div class="copyright float-right">
          &copy;
          <script>
            document.write(new Date().getFullYear())
          </script>, hecho con <i class="material-icons">favorite</i> de
          <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> modificado por XalCuadrado.
        </div>
      </div>
    </footer>
@endsection
