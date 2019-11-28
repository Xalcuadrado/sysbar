@extends('layouts.app')
@section('title','Lista de ingredientes')
@section('body-class','profile-page sidebar-collapse')
@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/bg_4.jpg') }}')">
</div>
  <div class="main main-raised">
    <div class="container">
      <div class="section text-center">
        <h2 class="title">Listado de ingredientes</h2>
        @can('ingredientes.create')
			<a href="{{ url('/ingredientes/create') }}" class="btn btn-primary btn-round">Nuevo ingrediente</a>
			@endcan
      <p></p>
      @if (session('notificacion'))
            <div class="alert alert-success">
              {{ session('notificacion') }}
            </div>
          @endif
      <div class="row">
          <div class="col-sm">
            @include('ingredientes.search')
          </div>
        </div>
        <div class="team">
          <div class="row">
            <table class="table">
    			    <thead>
    			        <tr>
    			            <th class="text-center">#</th>
    			            <th>Nombre</th>
    			            <th class="text-right">Acciones</th>
    			        </tr>
    			    </thead>
    			    <tbody>
    			    	@foreach($empresas as $e)
							@foreach($empresa_users as $eu)
								@foreach ($ingredientes as $ingrediente)
									@if(auth()->id()==$eu->idusers && $ingrediente->usuario == $eu->idusers && $e->idempresa == $ingrediente->empresa)
			    			        <tr>
			    			            <td class="text-center">{{ $ingrediente->idingrediente }}</td>
			    			            <td>{{ $ingrediente->ingrediente }}</td>
			    			            <td class="td-actions text-right">
			                          @can('ingredientes.show')
			    			                <a href="{{ route('ingredientes.show', $ingrediente->idingrediente )}}" rel="tooltip" title="Ver en detalle" class="btn btn-info btn-sm">
			    			                    <i class="fa fa-info"></i>
			    			                </a>
			                          @endcan
			                          @can('ingredientes.edit')
			    			                <a href="{{ route('ingredientes.edit', $ingrediente->idingrediente )}}" rel="tooltip" title="Editar datos" class="btn btn-success btn-sm">
			    			                    <i class="fa fa-edit"></i>
			    			                </a>
			                          @endcan
			                          @can('ingredientes.destroy')
			                          <a href="" data-target="#modal-delete-{{$ingrediente->idingrediente}}" data-toggle="modal" rel="tooltip" title="Remover del sistema" class="btn btn-danger btn-sm">
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
            {{ $ingredientes->links("pagination::bootstrap-4") }}
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer class="footer footer-default">
    @foreach($ingredientes as $ingrediente)
    @include('ingredientes.modal')
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
