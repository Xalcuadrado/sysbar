@extends('layouts.app')
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
                <img width="150px" height="150px" src="{{asset('imagenes/empresas/'.$empresa->logo)}}" alt="Circle Image" class="img-raised rounded-circle img-fluid">
              </div>
              <div class="name">
                <h3 class="title">{{ $empresa->nombre }}</h3>
                <h6>Aliado</h6>
                <a href="#" class="btn btn-just-icon btn-link btn-facebook"><i class="fa fa-facebook"></i></a>
                <a href="#" class="btn btn-just-icon btn-link btn-twitter"><i class="fa fa-twitter"></i></a>
                <a href="#" class="btn btn-just-icon btn-link btn-phone"><i class="fa fa-phone"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="description text-center">
          <p>La empresa {{ $empresa->nombre }} fue creada en {{ $empresa->created_at }} hrs. y la ultima actualización de datos fue {{ $empresa->updated_at }} hrs. </p>
        </div>
        <div class="row">
          <div class="col-sm">
            <div class="form-group">
              <a href="{{ url('empresas') }}" class="btn btn-danger btn-round">Volver</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection