@extends('layouts.app')
@section('title','Lista de ordenes pendientes')
@section('body-class','profile-page sidebar-collapse')
@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/bg_4.jpg') }}')">
</div>
  <div class="main main-raised">
    <div class="container">
      <div class="section text-center">
        <h2 class="title">Listado de ordenes pendientes</h2>
      <p></p>
      <div class="row">
          <div class="col-sm">
            @include('orders.search')
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
    			            <th class="text-right">Acciones</th>
    			        </tr>
    			    </thead>
    			    <tbody>
    			    	@foreach($orders as $order)
    			        <tr>
    			            <td class="text-center">{{ $order->idcart }}</td>
    			            <td><a href="" data-target="#modal-edit-{{$order->idcart}}" data-toggle="modal" rel="tooltip" title="Ver y evaluar" class="btn btn-warning btn-sm">{{ $order->status }}</a></td>
    			            <td>{{ $order->usuario }} {{ $order->apellido }}</td>
                      <td>{{ $order->t_documento }} : {{ $order->n_documento }}</td>
    			            <td class="td-actions text-right">
<!--     			                <a href="{{ route('orders.show', $order->idcart )}}" rel="tooltip" title="Ver en detalle" class="btn btn-info btn-sm">
    			                    <i class="fa fa-info"></i>
    			                </a> -->
                          <a href="" data-target="#modal-delete-{{$order->idcart}}" data-toggle="modal" rel="tooltip" title="Remover del sistema" class="btn btn-danger btn-sm">
                            <i class="fa fa-times"></i>
                          </a>
    			            </td>
    			        </tr>
                  
    			        @endforeach
    			    </tbody>
			      </table>
            {{ $orders->links("pagination::bootstrap-4") }}
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer class="footer footer-default">
    @foreach($orders as $order)
    @include('orders.edit')
    @include('orders.modal')
    @endforeach
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
