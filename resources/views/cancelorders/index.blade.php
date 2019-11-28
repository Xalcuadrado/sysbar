@extends('layouts.app')
@section('title','Lista de ordenes')
@section('body-class','profile-page sidebar-collapse')
@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/bg_4.jpg') }}')">
</div>
  <div class="main main-raised">
    <div class="container">
      <div class="section text-center">
        <h2 class="title">Listado de ordenes</h2>
      <p></p>
      <div class="row">
          <div class="col-sm">
            @include('cancelorders.search')
          </div>
        </div>
        <div class="team">
          <div class="row">
            <table class="table">
    			    <thead>
    			        <tr>
    			            <th class="text-center">#</th>
    			            <th>Estado</th>
    			            <th>Usuario</th>
                      <th>Documentación</th>
    			        </tr>
    			    </thead>
    			    <tbody>
    			    	@foreach($cancelorders as $order)
    			        <tr>
    			            <td class="text-center">{{ $order->idcart }}</td>
    			            <td>
                        <input type="hidden" name="status" value="{{ $order->status }}">
                        @if($order->status == 'aceptado')
                        <a href="" data-target="#modal-edit-{{$order->idcart}}" data-toggle="modal" rel="tooltip" title="Ver y evaluar" class="btn btn-info btn-sm">{{ $order->status }}</a>
                        @elseif($order->status == 'cancelado')
                        <a href="" data-target="#modal-edit-{{$order->idcart}}" data-toggle="modal" rel="tooltip" title="Ver y evaluar" class="btn btn-danger btn-sm">{{ $order->status }}</a>@elseif($order->status == 'pendiente')
                        <a href="" data-target="#modal-edit-{{$order->idcart}}" data-toggle="modal" rel="tooltip" title="Ver y evaluar" class="btn btn-warning btn-sm">{{ $order->status }}</a>@elseif($order->status == 'finalizado')
                        <a href="" data-target="#modal-edit-{{$order->idcart}}" data-toggle="modal" rel="tooltip" title="Ver y evaluar" class="btn btn-success btn-sm">{{ $order->status }}</a>
                        @else
                        <a href="" data-target="#modal-edit-{{$order->idcart}}" data-toggle="modal" rel="tooltip" title="Ver y evaluar" class="btn btn-default btn-sm">{{ $order->status }}</a>
                        @endif
                      </td>
    			            <td>{{ $order->usuario }} {{ $order->apellido }}</td>
                      <td>{{ $order->t_documento }} : {{ $order->n_documento }}</td>
    			        </tr>
                  
    			        @endforeach
    			    </tbody>
			      </table>
            {{ $cancelorders->links("pagination::bootstrap-4") }}
          </div>
        </div>
      </div>
    </div>
  </div>
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
