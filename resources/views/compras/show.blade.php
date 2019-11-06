@extends('layouts.app')
@section('title','Detalle del compra')
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
                <h3 class="title">Detalle - {{ $compra->estado }}</h3>
                <div class="row">
                  <div class="col-sm text-left">
                    <h6><strong>Proveedor : </strong>{{ $compra->nombre }}</h6>
                    <h6><strong>Comprobante : </strong>{{ $compra->t_comprobante }} : {{ $compra->n_comprobante }}</h6>
                    <h6><strong>Empresa  : </strong>{{ $compra->empresa }}</h6>
                  </div>
                </div>               
            <hr style="border-top: 2px solid #c49b63; width: 50%">
              </div><!--  name -->
            </div>
          </div>
        </div>
        <div class="description text-center">

                        <h6><strong>Detalle de la compra</strong></h6>
                <div class="row">
                  <div class="col-sm">
                    <table class="table">
                      <thead>
                          <tr>
                              <th>Producto</th>
                              <th class="text-right" >Cantidad</th>
                              <th class="text-right" >Costo unitario</th>
                              <th class="text-right" >Subtotal</th>
                          </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <td></td>
                          <td></td>
                          <td class="text-right" >Total sin impuesto :</td>
                          <td class="text-right" >$ {{ $compra->total }}</td>
                        </tr>
                        <tr>
                          <td></td>
                          <td></td>
                          <td class="text-right" >Impuesto - 19% :</td>
                          <td class="text-right" >$ {{$compra->total*$compra->impuesto}}</td>
                        </tr><tr>
                          <td></td>
                          <td></td>
                          <td class="text-right" >TOTAL :</td>
                          <td class="text-right" >$ {{($compra->total*$compra->impuesto)+$compra->total}} </td>
                        </tr>
                      </tfoot>
                      <tbody>
                        @foreach($detalles as $detalle)
                        <tr>
                          <td>{{ $detalle->producto }}</td>
                          <td class="text-right" >{{ $detalle->cantidad }}</td>
                          <td class="text-right" >$ {{ $detalle->precio_compra }}</td>
                          <td class="text-right" >$ {{ $detalle->cantidad*$detalle->precio_compra }}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>

          <p>El compra {{ $compra->nombre }} fue creado en {{ $compra->created_at }} hrs. y la ultima actualización de datos fue {{ $compra->updated_at }} hrs. </p>
        </div>
        <div class="row">
          <div class="col-sm">
            <div class="form-group">
              <a href="{{ url('compras') }}" class="btn btn-danger btn-round">Volver</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection