@extends('layouts.app')
@section('body-class','login-page sidebar-collapse')
@section('content')
<div class="page-header header-filter" style="background-image: url('{{ asset('img/bg_4.jpg') }}'); background-size: cover; background-position: top center;">

  <div class="main main-raised" style="width: 80%; margin: auto; margin-top: 100px;">
    <div class="container">
        <div class="row">
            <div class="col-sm">
                    <form class="form" method="POST" action="{{ route('register') }}" onsubmit="return validar();">
                        {{ csrf_field() }}
                        <h4 class="card-title text-center">Registro</h4>
                        <p class="description text-center">Todos los datos son requeridos</p>
                            <div class="row">
                                <div class="col-sm">
                                    <br>
                                    <div class="form-group">
                                        <select id="identificacion" name="t_documento" class="custom-select">
                                            <option value="0" selected disabled>Seleccione</option>
                                            <option value="RUT">RUT Nacional</option>
                                            <option value="PAS">Pasaporte / Passport</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    @if ($errors->has('n_documento'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('n_documento') }}</strong>
                                    </span>
                                    @endif
                                    <div class="form-group{{ $errors->has('n_documento') ? ' has-error' : '' }}">
                                        <label for="n_documento" class="bmd-label-floating">Número de identificación</label>
                                            <input name="n_documento" type="text" class="form-control" id="n_documento" autocomplete="off" maxlength="12" required>
                                        <span class="bmd-help">Escriba los dígitos del documento, sin el guión</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm">
                                    <div class="form-group">
                                        <label for="name" class="bmd-label-floating">Nombre</label>
                                            <input name="name" type="text" class="form-control" id="name" autocomplete="off" maxlength="15" required>
                                        <span class="bmd-help">Escribe tu primer nombre</span>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="form-group">
                                        <label for="apellido" class="bmd-label-floating">Apellido</label>
                                            <input name="apellido" type="text" class="form-control" id="apellido" autocomplete="off" maxlength="15" required>
                                        <span class="bmd-help">Escribe tu apellido paterno</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm">
                                    <div class="form-group">
                                        <label for="email" class="bmd-label-floating">Correo Electrónico</label>
                                            <input name="email" type="email" class="form-control" id="email" autocomplete="off" maxlength="100" required>
                                        <span class="bmd-help">Ejemplo nombre@mail.com</span>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="form-group">
                                        <label for="telefono" class="bmd-label-floating">Teléfono</label>
                                            <input name="telefono" type="text" class="form-control" id="telefono" autocomplete="off" maxlength="14" required>
                                        <span class="bmd-help">Ejemplo +56 9 45520400</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm">
                                    <div class="form-group">
                                        <label for="password" class="bmd-label-floating">Contraseña</label>
                                        <input type="password" name="password" class="form-control" id="password" maxlength="16" required>
                                            <span class="bmd-help">Usar Mayúsculas, minúsculas, signos y dígitos</span>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="form-group">
                                        <label for="password_confirmation" class="bmd-label-floating">Confirmar contraseña</label>
                                        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" maxlength="16" required>
                                        <span class="bmd-help">
                                            Repita la contraseña para la confirmación
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm">
                                    <div class="form-group text-center">
                                        <button type="submit" class="btn btn-info btn-round btn-sm">Registrarse</button>
                                    </div>
                                </div> 
                            </div>
                    </form>
            </div>
            <div class="col-sm" style="background-image: url('{{ asset('img/register.jpg') }}'); background-size: cover; background-position: top center; margin-top: 35px; margin-bottom: 35px; border-radius: 10px;">
                
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="container">
            <div class="copyright text-center">
                &copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script>, hecho con <i class="material-icons">favorite</i> de
                <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> modificado por XalCuadrado.
            </div>
        </div>
    </footer>
</div>
@endsection
