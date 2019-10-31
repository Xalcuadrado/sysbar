@extends('layouts.app')
@section('title','Lista de mesas')
@section('body-class','profile-page sidebar-collapse')
@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/bg_4.jpg') }}')">
</div>
  <div class="main main-raised">
    <div class="container">
      <div class="section text-center">
        <h2 class="title">Listado de mesas</h2>
        @can('mesas.create')
			<a href="{{ url('/mesas/create') }}" class="btn btn-primary btn-round">Nueva mesa</a>
			@endcan
      <p></p>
      <div class="row">
          <div class="col-sm">
            @include('mesas.search')
          </div>
        </div>
        <div class="team">
          <div class="row">
            <table class="table">
    			    <thead>
    			        <tr>
    			            <th class="text-center">#</th>
                      <th>Código</th>
    			            <th>Nombre</th>
    			            <th class="text-right">Acciones</th>
    			        </tr>
    			    </thead>
    			    <tbody>
    			    	@foreach($empresas as $e)
							@foreach($empresa_users as $eu)
								@foreach ($mesas as $mesa)
									@if(auth()->id()==$eu->idusers && $mesa->usuario == $eu->idusers && $e->idempresa == $mesa->empresa)
			    			        <tr>
			    			            <td class="text-center">{{ $mesa->idmesa }}</td>
			    			            <td>{{ $mesa->codigo }}</td>
                            <td>{{ $mesa->nombre }}</td>
			    			            <td class="td-actions text-right">
			                          @can('mesas.show')
			    			                <a href="{{ route('mesas.show', $mesa->idmesa )}}" rel="tooltip" title="Ver en detalle" class="btn btn-info btn-sm">
			    			                    <i class="fa fa-info"></i>
			    			                </a>
			                          @endcan
			                          @can('mesas.edit')
			    			                <a href="{{ route('mesas.edit', $mesa->idmesa )}}" rel="tooltip" title="Editar datos" class="btn btn-success btn-sm">
			    			                    <i class="fa fa-edit"></i>
			    			                </a>
			                          @endcan
			                          @can('mesas.destroy')
			                          <a href="" data-target="#modal-delete-{{$mesa->idmesa}}" data-toggle="modal" rel="tooltip" title="Remover del sistema" class="btn btn-danger btn-sm">
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
            {{ $mesas->links("pagination::bootstrap-4") }}
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer class="footer footer-default">
    @foreach($mesas as $mesa)
    @include('mesas.modal')
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
