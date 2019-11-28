@extends('layouts.app')
@section('title','Lista de ordenes')
@section('body-class','profile-page sidebar-collapse')
@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/bg_4.jpg') }}')">
</div>
  <div class="main main-raised">
    <div class="container">
      <div class="section text-center">
        <h2 class="h6" style="font-size: 1.5em;">Listado de pedidos</h2>
      <p></p>
      <div class="row">
          <div class="col-sm">
            @include('mispedidos.search')
          </div>
        </div>
        <div class="team">
          <div class="row">
            <table class="table">
    			    <thead>
    			        <tr>
    			            <th class="text-center">#</th>
    			            <th>Estado actual del pedido</th>
    			            <th>Realizado en</th>
                      <th>Documentación</th>
    			        </tr>
    			    </thead>
    			    <tbody>
    			    	@foreach($allorders as $order)
                  @if($order->idusuario == Auth::user()->id)
    			        <tr>
    			            <td class="text-center">{{ $order->idcart }}</td>
    			            <td>
                        <input type="hidden" name="status" value="{{ $order->status }}">
                        @if($order->status == 'aceptado')
                        <a href="" data-target="#modal-edit-{{$order->idcart}}" data-toggle="modal" rel="tooltip" title="Ver" class="btn btn-info btn-sm">{{ $order->status }}</a>
                        @elseif($order->status == 'cancelado')
                        <a href="" data-target="#modal-edit-{{$order->idcart}}" data-toggle="modal" rel="tooltip" title="Ver" class="btn btn-danger btn-sm">{{ $order->status }}</a>@elseif($order->status == 'pendiente')
                        <a href="" data-target="#modal-edit-{{$order->idcart}}" data-toggle="modal" rel="tooltip" title="Ver" class="btn btn-warning btn-sm">{{ $order->status }}</a>@elseif($order->status == 'finalizado')
                        <a href="" data-target="#modal-edit-{{$order->idcart}}" data-toggle="modal" rel="tooltip" title="Ver" class="btn btn-success btn-sm">{{ $order->status }}</a>
                        @else
                        <a href="" data-target="#modal-edit-{{$order->idcart}}" data-toggle="modal" rel="tooltip" title="Ver" class="btn btn-default btn-sm">{{ $order->status }}</a>
                        @endif
                      </td>
    			            <td>{{ $order->created_at }}</td>
                      <td>{{ $order->t_documento }} : {{ $order->n_documento }}</td>
    			        </tr>
                  @endif
    			        @endforeach
    			    </tbody>
			      </table>
            {{ $allorders->links("pagination::bootstrap-4") }}
          </div>
        </div>
      </div>
    </div>
  </div>
      @foreach($allorders as $order)
    @include('mispedidos.edit')
    @endforeach
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
