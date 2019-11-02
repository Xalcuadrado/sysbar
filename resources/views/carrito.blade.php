@extends('layouts.app')
@section('title','Mi carrito SBAR')
@section('body-class','profile-page sidebar-collapse')
@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/bg_4.jpg')  }}');"></div>
  <div class="main main-raised">
    <div class="profile-content">
      <div class="container">
        <div class="section">
          <p class="h4 text-center" >SBAR Pedido</p>
          @if (session('notificacion'))
            <div class="alert alert-success">
              {{ session('notificacion') }}
            </div>
          @endif
        </div>
        <br>
        <div class="row">
          <div class="col">
            Tu carrito actualmente tiene {{ auth()->user()->cart->details->count() }} productos añadidos
          </div>
        </div>
        <br> 
        <div class="row">
        <div class="col-sm responsive">
          <table class="table">
            <thead>
                <tr>
                    <th class="text-center">Referencia</th>
                    <th>Producto</th>
                    <th style="width: 100px;" >Precio</th>
                    <th style="width: 50px;">+</th>
                    <th class="text-right" style="width: 100px;">Subtotal</th>
                    <th style="width: 80px;">Acciones</th>
                </tr>
            </thead> 
            <tbody>
          @foreach (auth()->user()->cart->details as $detail)
              <tr>
                <td class="text-center"> <img width="50px" height="50px" src="{{asset('imagenes/productos/'.$detail->producto->imagen)}}" alt="Circle Image" class="img-raised img-thumbnail img-fluid">
                </td>
                <td>{{ $detail->producto->nombre }}</td>
                <td>$ {{ $detail->producto->precio }}</td>
                <td>{{ $detail->cantidad }}</td>
                <td class="text-right">$ {{ $detail->cantidad * $detail->producto->precio }}</td>
                <td>
                  <form method="post" action="{{ url('/cart') }}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <input type="hidden" name="cart_detail_id" value="{{ $detail->id }}">
                    <!-- <a href="{{ url('/products/'.$detail->producto->idproducto) }}" target="_blank" rel="tooltip" title="Ver detalle" class="btn btn-info btn-simple btn-sm">
                    <i class="fa fa-info"></i>
                  </a> -->
                  <button type="submit" rel="tooltip" title="Remover" class="btn btn-danger btn-simple btn-sm">
                    <i class="fa fa-times"></i>
                  </button>
                  </form>
                </td>
              </tr>
          @endforeach
            </tbody>
            <tfoot>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td class="text-right"><strong>TOTAL</strong></td>
                <td class="text-right"><strong>$ {{ auth()->user()->cart->total }}</strong></td>
                <td></td>
              </tr>
              
            </tfoot>
        </table>
        <div class="text-center">
          <div class="form-group">
            <form method="post" action="{{ url('/order') }}">
              {{ csrf_field() }}
                <button type="submit" class="btn btn-info btn-round">
                <i class="material-icons">done</i>Realizar pedido
                </button>
            </form>
          </div>
        </div>
        </div>   
        </div>
      </div>
    </div>
  </div>
  @endsection