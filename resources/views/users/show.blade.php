@extends('layouts.app')
@section('title','Detalle del usuario')
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
                <img width="150px" height="150px" src="{{asset('imagenes/users/'.$user->foto)}}" alt="Circle Image" class="img-raised rounded-circle img-fluid">
              </div>
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
          <p>El usuario {{ $user->name }} {{ $user->apellido }} se registró el {{ $user->created_at }} hrs. y la ultima actualización de datos fue {{ $user->updated_at }} hrs. </p>
        </div>
        <div class="row">
          <div class="col-sm">
            <div class="form-group">
              <a href="{{ url('users') }}" class="btn btn-danger btn-round">Volver</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection