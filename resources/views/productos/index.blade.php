@extends('layouts.app')
@section('title','Lista de productos')
@section('body-class','profile-page sidebar-collapse')
@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/bg_4.jpg') }}')">
</div>
  <div class="main main-raised">
    <div class="container">
      <div class="section text-center">
        <h2 class="title">Listado de productos</h2>
        @can('productos.create')
			<a href="{{ url('/productos/create') }}" class="btn btn-primary btn-round">Nuevo producto</a>
			@endcan
      <p></p>
      <div class="row">
          <div class="col-sm">
            @include('productos.search')
          </div>
        </div>
        <div class="team">
          <div class="row">
            <table class="table">
    			    <thead>
    			        <tr>
    			            <th class="text-center">#</th>
                      <th>Referencia</th>
                      <th>Código</th>
    			            <th>Nombre</th>
                      <th>Categoría</th>
                      <th>Precio</th>
                      <th>Stock</th>
                      <th>Estado</th>
    			            <th class="text-right">Acciones</th>
    			        </tr>
    			    </thead>
    			    <tbody>
    			    	@foreach($empresas as $e)
    							@foreach($empresa_users as $eu)
    								@foreach ($productos as $producto)
    									@if(auth()->id()==$eu->idusers && $producto->usuario == $eu->idusers && $e->idempresa == $producto->empresa)
			    			        <tr>
			    			            <td class="text-center">{{ $producto->idproducto }}</td>
                            <td><img style="width:  70px; height: 70px;" src="{{asset('imagenes/productos/'.$producto->imagen)}}" alt="{{ $producto->producto}}" class="img-raised img-thumbnail img-fluid"></td>
                            <td>{{ $producto->codigo }}</td>
                            <td>{{ $producto->producto }}</td>
                            <td>{{ $producto->categoria }}</td>
                            <td>{{ $producto->precio }}</td>
                            <td>{{ $producto->stock }}</td>
                            <td>
                              <input type="hidden" value="{{$producto->estado}}">
                                @if($producto->estado=='Inactivo')
                                  <img src="{{asset('img/cancel.png')}}">
                                @else
                                  <img src="{{asset('img/checked.png')}}">
                                @endif
                            </td>
			    			            <td class="td-actions text-right">
			                          @can('productos.show')
			    			                <a href="{{ route('productos.show', $producto->idproducto )}}" rel="tooltip" title="Ver en detalle" class="btn btn-info btn-sm">
			    			                    <i class="fa fa-info"></i>
			    			                </a>
			                          @endcan
			                          @can('productos.edit')
			    			                <a href="{{ route('productos.edit', $producto->idproducto )}}" rel="tooltip" title="Editar datos" class="btn btn-success btn-sm">
			    			                    <i class="fa fa-edit"></i>
			    			                </a>
			                          @endcan
			                          @can('productos.destroy')
			                          <a href="" data-target="#modal-delete-{{$producto->idproducto}}" data-toggle="modal" rel="tooltip" title="Cambiar el estado" class="btn btn-danger btn-sm">
			                            <i class="fa fa-refresh"></i>
			                          </a>
			                          @endcan
			    			            </td>
			    			        </tr>
    			        			@endif
    								@endforeach
    							@endforeach
    						@endforeach
    			    </tbody>
			      </table>
            {{ $productos->links("pagination::bootstrap-4") }}
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer class="footer footer-default">
    @foreach($productos as $producto)
    @include('productos.modal')
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
