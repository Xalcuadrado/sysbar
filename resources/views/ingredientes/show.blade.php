@extends('layouts.app')
@section('title','Detalle de ingrediente')
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
                <h3 class="title">Ingrediente</h3>
                <h6><strong>Nombre : </strong>{{ $ingrediente->nombre }}</h6>
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
          <p>El ingrediente {{ $ingrediente->nombre }} fue creado en {{ $ingrediente->created_at }} hrs. y la ultima actualización de datos fue {{ $ingrediente->updated_at }} hrs. </p>
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