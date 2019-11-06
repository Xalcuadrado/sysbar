@extends('layouts.app')
@section('title','Detalle de categoria')
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
                <img width="150px" height="150px" src="{{asset('img/logosbar.png')}}" alt="Circle Image" class="img-raised img-thumbnail img-fluid">
              </div>
              <div class="name">
                <h3 class="title">Categoria</h3>
                <h6><strong>Nombre : </strong>{{ $categoria->nombre }}</h6>
                <h6><strong>Descripción : </strong>{{ $categoria->descripcion }}</h6>
              </div>
            </div>
          </div>
        </div>
        <div class="description text-center">
          <p>La categoria {{ $categoria->nombre }} fue creada en {{ $categoria->created_at }} hrs. y la ultima actualización de datos fue {{ $categoria->updated_at }} hrs. </p>
        </div>
        <div class="row">
          <div class="col-sm">
            <div class="form-group">
              <a href="{{ url('categorias') }}" class="btn btn-danger btn-round">Volver</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection