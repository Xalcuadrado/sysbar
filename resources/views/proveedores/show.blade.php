@extends('layouts.app')
@section('title','Detalle de proveedor')
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
                <h3 class="title">Proveedor</h3>
                  <div class="row">
                    <div class="col-sm text-left">
                      <h6><strong>Nombre : </strong>{{ $proveedor->nombre }}</h6>
                      <h6><strong>Identificación : </strong>{{ $proveedor->t_documento }} : {{ $proveedor->n_documento }}</h6>
                      <h6><strong>Teléfono  : </strong>{{ $proveedor->telefono }}</h6>
                      <h6><strong>E-mail  : </strong>{{ $proveedor->email }}</h6>
                      <h6><strong>Dirección  : </strong>{{ $proveedor->direccion }}</h6>
                    </div>
                  </div> 
                @foreach($empresas as $empresa)
                      @foreach($empresa_users as $eu)
                        @if(auth()->id()==$eu->idusers && $empresa->idempresa==$eu->idempresa)
                          <h6><strong>Pertenece a la empresa : </strong>{{ $empresa->nombre }}</h6>
                        @endif
                      @endforeach
                    @endforeach
                
              </div>
            </div>
          </div>
        </div>
        <div class="description text-center">
          <p>El proveedor {{ $proveedor->nombre }} fue creado en {{ $proveedor->created_at }} hrs. y la ultima actualización de datos fue {{ $proveedor->updated_at }} hrs. </p>
        </div>
        <div class="row">
          <div class="col-sm">
            <div class="form-group">
              <a href="{{ url('proveedores') }}" class="btn btn-danger btn-round">Volver</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection