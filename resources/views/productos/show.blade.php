@extends('layouts.app')
@section('title','Detalle del producto')
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
                <img width="150px" height="150px" src="{{asset('imagenes/productos/'.$producto->imagen)}}" alt="Circle Image" class="img-raised img-thumbnail img-fluid">
              </div>
              <div class="name">
                <h3 class="title">{{ $producto->nombre }}</h3>
                <div class="row">
                  <div class="col-sm text-left">
                    <h6><strong>Código : </strong>{{ $producto->codigo }}</h6>
                    <h6><strong>Precio : </strong> $ {{ $producto->precio }}</h6>
                    <h6><strong>Stock  : </strong>{{ $producto->stock }}</h6>
                    <h6><strong>Categoría  : </strong>{{ $producto->categoria }}</h6>
                    <h6><strong>Descripción  : </strong></h6><p class="description">{{ $producto->descripcion }}</p>
                  </div>
                </div>               
            <hr style="border-top: 2px solid #c49b63; width: 50%">

                    <h6><strong>Ingredientes</strong></h6>
                <div class="row">
                  <div class="col-sm">
                    <table class="table">
                      <thead>
                          <tr>
                              <th>Tipo</th>
                              <th>Porción o cantidad</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($detalles as $detalle)
                        <tr>
                          <td>{{ $detalle->ingrediente }}</td>
                          <td>{{ $detalle->cantidad }}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
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
          <p>El producto {{ $producto->nombre }} fue creado en {{ $producto->created_at }} hrs. y la ultima actualización de datos fue {{ $producto->updated_at }} hrs. </p>
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