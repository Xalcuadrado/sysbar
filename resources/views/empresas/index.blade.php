@extends('layouts.app')
@section('title','Lista de empresas')
@section('body-class','profile-page sidebar-collapse')
@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/bg_4.jpg') }}')">
</div>
  <div class="main main-raised">
    <div class="container">
      <div class="section text-center">
        <h2 class="title">Listado de empresas</h2>
        @can('empresas.create')
			   <a href="{{ url('/empresas/create') }}" class="btn btn-primary btn-round">Nueva empresa</a>
			  @endcan
        <p></p>
                  @if (session('notificacion'))
            <div class="alert alert-success">
              {{ session('notificacion') }}
            </div>
          @endif
        <div class="row">
          <div class="col-sm">
            @include('empresas.search')
          </div>
        </div>
        <div class="team">
          <div class="row">
            <!-- <div class="form-group pull-right">
              <input type="text" class="search form-control" placeholder="What you looking for?">
            </div>
              <span class="counter pull-right"></span> -->
            <table class="table "><!-- results -->
    			    <thead>
    			        <tr>
    			            <th class="text-center">#</th>
    			            <th>Nombre</th>
    			            <th>Logo</th>
    			            <th class="text-right">Acciones</th>
    			        </tr>
                  <!-- <tr class="warning no-result">
                    <td colspan="4"><i class="fa fa-warning"></i> No result</td>
                  </tr> -->
    			    </thead>
    			    <tbody>
    			    	@foreach($empresas as $empresa)
    			            <td class="text-center">{{ $empresa->idempresa }}</td>
    			            <td>{{ $empresa->nombre }}</td>
    			            <td><img style="width:  70px; height: 70px;" src="{{asset('imagenes/empresas/'.$empresa->logo)}}" alt="{{ $empresa->nombre}}" class="img-raised img-thumbnail img-fluid"></td>
    			            <td class="td-actions text-right">
                          @can('empresas.show')
    			                <a href="{{ route('empresas.show', $empresa->idempresa )}}" rel="tooltip" title="Ver en detalle" class="btn btn-info btn-sm">
    			                    <i class="fa fa-info"></i>
    			                </a>
                          @endcan
                          @can('empresas.edit')
    			                <a href="{{ route('empresas.edit', $empresa->idempresa )}}" rel="tooltip" title="Editar datos" class="btn btn-success btn-sm">
    			                    <i class="fa fa-edit"></i>
    			                </a>
                          @endcan
                          @can('empresas.destroy')
                          <a href="" data-target="#modal-delete-{{$empresa->idempresa}}" data-toggle="modal" rel="tooltip" title="Remover del sistema" class="btn btn-danger btn-sm">
                            <i class="fa fa-times"></i>
                          </a>
                          @endcan
    			            </td>
    			        </tr>
                  
    			        @endforeach
    			    </tbody>
			      </table>
            {{ $empresas->links("pagination::bootstrap-4") }}
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer class="footer footer-default">
    @foreach($empresas as $empresa)
    @include('empresas.modal')
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
