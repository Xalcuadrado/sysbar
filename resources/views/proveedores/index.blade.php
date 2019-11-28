@extends('layouts.app')
@section('title','Lista de proveedores')
@section('body-class','profile-page sidebar-collapse')
@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/bg_4.jpg') }}')">
</div>
  <div class="main main-raised">
    <div class="container">
      <div class="section text-center">
        <h2 class="title">Listado de proveedores</h2>
        @can('proveedores.create')
			<a href="{{ url('/proveedores/create') }}" class="btn btn-primary btn-round">Nuevo proveedor</a>
			@endcan
      <p></p>
                  @if (session('notificacion'))
            <div class="alert alert-success">
              {{ session('notificacion') }}
            </div>
          @endif
      <div class="row">
          <div class="col-sm">
            @include('proveedores.search')
          </div>
        </div>
        <div class="team">
          <div class="row">
            <table class="table">
    			    <thead>
    			        <tr>
    			            <th class="text-center">#</th>
                      <th>Identificación</th>
    			            <th>Nombre</th>
                      <th class="text-left">Contacto</th>
    			            <th class="text-right">Acciones</th>
    			        </tr>
    			    </thead>
    			    <tbody>
    			    @foreach($empresas as $e)
							 @foreach($empresa_users as $eu)
								@foreach ($proveedores as $proveedor)
									@if(auth()->id()==$eu->idusers && $proveedor->usuario == $eu->idusers && $e->idempresa == $proveedor->empresa)
			    			        <tr>
			    			            <td class="text-center">{{ $proveedor->idproveedor }}</td>
                            <td> {{ $proveedor->t_documento }} : {{ $proveedor->n_documento }}</td>
                            <td>{{ $proveedor->nombre }}</td>
                            <td class="text-left">
                              <li> Tel : {{ $proveedor->telefono }}</li>
                              <li> E-mail : {{ $proveedor->email }}</li>
                              <li> Dirección : {{ $proveedor->direccion }}</li>
                            </td>
			    			            <td class="td-actions text-right">
			                          @can('proveedores.show')
			    			                <a href="{{ route('proveedores.show', $proveedor->idproveedor )}}" rel="tooltip" title="Ver en detalle" class="btn btn-info btn-sm">
			    			                    <i class="fa fa-info"></i>
			    			                </a>
			                          @endcan
			                          @can('proveedores.edit')
			    			                <a href="{{ route('proveedores.edit', $proveedor->idproveedor )}}" rel="tooltip" title="Editar datos" class="btn btn-success btn-sm">
			    			                    <i class="fa fa-edit"></i>
			    			                </a>
			                          @endcan
			                          @can('proveedores.destroy')
			                          <a href="" data-target="#modal-delete-{{$proveedor->idproveedor}}" data-toggle="modal" rel="tooltip" title="Remover del sistema" class="btn btn-danger btn-sm">
			                            <i class="fa fa-times"></i>
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
            {{ $proveedores->links("pagination::bootstrap-4") }}
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer class="footer footer-default">
    @foreach($proveedores as $proveedor)
    @include('proveedores.modal')
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
