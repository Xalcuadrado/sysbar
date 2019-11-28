@extends('layouts.app')
@section('title','Perfil de usuario')
@section('body-class','profile-page sidebar-collapse')
@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/bg_4.jpg')  }}');"></div>
  <div class="main main-raised">
    <div class="profile-content">
      <div class="container">
        <div class="row">
          <div class="col-md-6 ml-auto mr-auto">
            <div class="profile">
              <div class="avatar">
                <img width="150px" height="150px" src="{{asset('imagenes/users/'.$user->foto)}}" alt="Circle Image" class="img-raised img-thumbnail img-fluid">
              </div>
              <br>
              <div class="name">
                @foreach($roles as $r)
                  @foreach($user_rol as $ur)
                    @if($user->id==$ur->user_id && $r->id==$ur->role_id)
                      <h3 class="label">{{ $r->name }}</h3>
                    @endif
                  @endforeach
                @endforeach
                <div class="row">
                  <div class="col-sm text-right">
                    <h6 class="label">
                      Datos personales
                    </h6>
                  </div>
                  <div class="col-sm text-left">
                    <h6><strong>Documentación : </strong>{{ $user->t_documento }} - {{ $user->n_documento }}</h6>
                    <h6><strong>Nombre : </strong>{{ $user->name }}</h6>
                    <h6><strong>Apellido : </strong>{{ $user->apellido }}</h6>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm text-right">
                    <h6 class="label">
                      Contacto
                    </h6>
                  </div>
                  <div class="col-sm text-left">
                    <h6><strong>E-mail : </strong>{{ $user->email }}</h6>
                    <h6><strong>Teléfono : </strong>{{ $user->telefono }}</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="description text-center">
          <p>Hola, bienvenido a tu perfil {{ $user->name }} {{ $user->apellido }} tu cuenta fue creada el {{ $user->created_at }} hrs. y la ultima actualización de tus datos fué {{ $user->updated_at }} hrs. Si no fuiste tu puedes contactarte con <a href="">nosotros</a></p>
        </div>
        <div class="row">
          <div class="col-sm">
            <div class="form-group">
              <a href="{{ url('/') }}" rel="tooltip" title="Inicio" class="btn btn-danger btn-round btn-sm">Volver al inicio</a>
              <a href="" data-target=".bd-example-modal-lg" data-toggle="modal" rel="tooltip" title="Actualización" class="btn btn-info btn-round btn-sm">Actualizar información</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    @include('perfil.edit')
    <footer class="footer footer-default">
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
              CEDIV Co.
            </a>
          </li>
          <li>
            <a href="">
              Redes Sociales
            </a>
          </li>
          <li>
            <a href="">
              Terminos y condiciones
            </a>
          </li>
        </ul>
      </nav>
      <div class="copyright float-right">
        &copy;
        <script>
          document.write(new Date().getFullYear())
        </script>, creado con <i class="material-icons">favorite</i> de
        <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> - editado por Xalcuadrado.
      </div>
    </div>
  </footer>
  @endsection