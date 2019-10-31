@extends('layouts.app')
@section('body-class','login-page sidebar-collapse')
@section('content')
<div class="page-header header-filter" style="background-image: url('{{ asset('img/bg2.jpg') }}'); background-size: cover; background-position: top center;">
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <div class="card card-register">
                    <form class="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        <h4 class="card-title text-center">Registro</h4>
                        <p class="description text-center">Todos los datos son requeridos</p>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm">
                                    <br>
                                    <div class="form-group">
                                        <select name="t_documento" class="custom-select">
                                            <option value="" selected disabled>Seleccione Identificación</option>
                                            <option value="RUT">RUT Nacional</option>
                                            <option value="PAS">Pasaporte / Passport</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="form-group">
                                        <label for="exampleInput1" class="bmd-label-floating">Número de identificación</label>
                                            <input name="n_documento" type="text" class="form-control" id="exampleInput1" autocomplete="off">
                                        <span class="bmd-help">Escriba los dígitos del documento</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm">
                                    <div class="form-group">
                                        <label for="exampleInput1" class="bmd-label-floating">Nombre</label>
                                            <input name="name" type="text" class="form-control" id="exampleInput1" autocomplete="off">
                                        <span class="bmd-help">Escribe tu primer nombre</span>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="form-group">
                                        <label for="exampleInput1" class="bmd-label-floating">Apellido</label>
                                            <input name="apellido" type="text" class="form-control" id="exampleInput1" autocomplete="off">
                                        <span class="bmd-help">Escribe tu apellido paterno</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm">
                                    <div class="form-group">
                                        <label for="exampleInput1" class="bmd-label-floating">Correo Electrónico</label>
                                            <input name="email" type="email" class="form-control" id="exampleInput1" autocomplete="off">
                                        <span class="bmd-help">Ejemplo nombre@mail.com</span>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="form-group">
                                        <label for="exampleInput1" class="bmd-label-floating">Teléfono</label>
                                            <input name="telefono" type="text" class="form-control" id="exampleInput1" autocomplete="off">
                                        <span class="bmd-help">Ejemplo +56 9 45520400</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm">
                                    <div class="form-group">
                                        <label for="exampleInput1" class="bmd-label-floating">Contraseña</label>
                                        <input type="password" name="password" class="form-control" id="exampleInput1" required>
                                            <span class="bmd-help">Se recomienda usar Mayúsculas, minúsculas, signos y dígitos</span>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="form-group">
                                        <label for="exampleInput1" class="bmd-label-floating">Confirmar contraseña</label>
                                        <input type="password" name="password_confirmation" class="form-control" id="exampleInput1" required>
                                        <span class="bmd-help">
                                            Repita la misma contraseña para la confirmación
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm">
                                    <div class="form-group text-center">
                                        <button type="submit" class="btn btn-primary btn-link btn-wd btn-lg">Registrarse</button>
                                    </div>
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
