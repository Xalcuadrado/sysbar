@extends('layouts.app')
@section('body-class','login-page sidebar-collapse')
@section('content')
<div class="page-header header-filter" style="background-image: url('{{ asset('img/bg_4.jpg') }}'); background-size: cover; background-position: top center;">
  <div class="main main-raised" style="width: 400px; margin: auto; margin-top: 100px;">
    <div class="container">
      <div class="section">
        <h6 class="label text-center">Iniciar sessión</h6>
        <br><br>
            <form class="form" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <div class="row">
                  <div class="col-11">
                    @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                      <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">mail</i>
                      </span>
                    </div>
                    <input id="email" type="email" class="form-control" name="email" placeholder="Correo electrónico" required autocomplete="off">
                    
                  </div>
                    </div>
                    
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-11">
                    @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                      <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="material-icons">lock_outline</i>
                        </span>
                      </div>
                      <input id="password" type="password" class="form-control" name="password" placeholder="Contraseña" required autocomplete="off">
                    </div>
                    </div>
                    
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-11 text-right" style="margin: auto;">
                    <a style="color: red; font-size: 0.6em;" class="btn btn-link" href="{{ route('password.request') }}">
                        ¿Olvidaste tu contraseña?
                    </a>
                  </div>
                </div>
                <div class="row">
                  <div class="col-4" style="margin: auto;">
                    <div class="form-group">
                      <button type="submit" class="btn btn-round btn-sm btn-info ">Ingresar</button>
                    </div>
                  </div>
                </div>
            </form>
          </div>
        </div>
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
