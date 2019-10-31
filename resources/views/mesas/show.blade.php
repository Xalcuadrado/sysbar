@extends('layouts.app')
@section('title','Detalle de mesa')
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
                <h3 class="title">Mesa</h3>
                <h6><strong>Código actual : </strong>{{ $mesa->codigo }}</h6>
                <h6><strong>Nombre : </strong>{{ $mesa->nombre }}</h6>
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
          <p>El mesa {{ $mesa->nombre }} fue creado en {{ $mesa->created_at }} hrs. y la ultima actualización de datos fue {{ $mesa->updated_at }} hrs. </p>
        </div>
        <div class="row">
          <div class="col-sm">
            <div class="form-group">
              <a href="{{ url('mesas') }}" class="btn btn-danger btn-round">Volver</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection