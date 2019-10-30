@extends('layouts.app')
@section('title','Detalle de user')
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
                <img width="150px" height="150px" src="{{asset('img/logosbar.png')}}" alt="Circle Image" class="img-raised rounded-circle img-fluid">
              </div>
              <div class="name">
                      <h3 class="label">{{ $role->name }}</h3>
                <div class="row">
                  <div class="col-sm text-right">
                    <h6 class="label">
                      Datos personales
                    </h6>
                  </div>
                  <div class="col-sm text-left">
                    <h6><strong>URL : </strong>{{ $role->slug }}</h6>
                    <h6><strong>descripción : </strong>{{ $role->description }}</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="description text-center">
          <p>El rol {{ $role->name }} se creó el {{ $role->created_at }} hrs. y la ultima actualización de datos fue {{ $role->updated_at }} hrs. </p>
        </div>
        <div class="row">
          <div class="col-sm">
            <div class="form-group">
              <a href="{{ url('roles') }}" class="btn btn-danger btn-round">Volver</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection