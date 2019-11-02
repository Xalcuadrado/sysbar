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
                <img width="150px" height="150px" src="{{asset('imagenes/productos/'.$producto->imagen)}}" alt="Circle Image" class="img-raised img-thumbnail img-fluid">
              </div>
              <div class="name">
              <h3 class="label"> {{ $producto->codigo }} - {{ $producto->producto }}</h3>
              @if (session('notificacion'))
            <div class="alert alert-success">
              {{ session('notificacion') }}
            </div>
          @endif
                <div class="row">
                  <div class="col-sm text-left">
                    <h5><strong>Precio : </strong> $ {{ $producto->precio }}</h5>
                    <h5><strong>Categoría : </strong> {{ $producto->categoria }} </h5>
                    <h5>Tenemos {{ $producto->stock }} unidades en estos momentos </h5>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm">
                <p>
              <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapse{{ $producto->idproducto }}" role="button" aria-expanded="false" aria-controls="multiCollapse{{ $producto->idproducto }}">Detalles de ingredientes</a>
            </p>
              </div>
              <div class="col-sm">
                <button class="btn btn-success" data-toggle="modal" data-target="#modalAddToCart">
                  <i class="material-icons">shopping_cart</i> Agregar al Carrito
                </button>
              </div>
            </div>
            
            @include('products.detalles')
          </div>
        </div>
        <div class="description text-center">
          <p>Descripción adicional : {{ $producto->descripcion }}</p>
            <p class="label"> Disponible :
                <input type="hidden" name="estado" value="{{ $producto->estado }}">
                @if($producto->estado=='Inactivo')
                <img src="{{asset('img/cancel.png')}}">
                @else
                <img src="{{asset('img/checked.png')}}">
                @endif
            </p>
        </div>
        <div class="row">
          <div class="col-sm">
            <div class="form-group">
              <button class="btn btn-danger btn-round" onclick="history.back(-2);">Volver</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('products.modal')
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
