@extends('layouts.app')
@section('title','Lista de categorias')
@section('body-class','profile-page sidebar-collapse')
@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/bg_4.jpg') }}')">
</div>
  <div class="main main-raised">
    <div class="container">
      <div class="section text-center">
        <h2 class="title">Listado de categorias</h2>
        @can('categorias.create')
			<a href="{{ url('/categorias/create') }}" class="btn btn-primary btn-round">Nueva categoria</a>
			@endcan
      <p></p>
      @if (session('notificacion'))
            <div class="alert alert-success">
              {{ session('notificacion') }}
            </div>
          @endif
      <div class="row">
          <div class="col-sm">
            @include('categorias.search')
          </div>
        </div>
        <div class="team">
          <div class="row">
            <table class="table">
    			    <thead>
    			        <tr>
    			            <th class="text-center">#</th>
    			            <th>Nombre</th>
    			            <th>Descripción</th>
    			            <th class="text-right">Acciones</th>
    			        </tr>
    			    </thead>
    			    <tbody>
    			    	@foreach($categorias as $categoria)
    			        <tr>
    			            <td class="text-center">{{ $categoria->idcategoria }}</td>
    			            <td>{{ $categoria->nombre }}</td>
    			            <td>{{ $categoria->descripcion }}</td>
    			            <td class="td-actions text-right">
                          @can('categorias.show')
    			                <a href="{{ route('categorias.show', $categoria->idcategoria )}}" rel="tooltip" title="Ver en detalle" class="btn btn-info btn-sm">
    			                    <i class="fa fa-info"></i>
    			                </a>
                          @endcan
                          @can('categorias.edit')
    			                <a href="{{ route('categorias.edit', $categoria->idcategoria )}}" rel="tooltip" title="Editar datos" class="btn btn-success btn-sm">
    			                    <i class="fa fa-edit"></i>
    			                </a>
                          @endcan
                          @can('categorias.destroy')
                          <a href="" data-target="#modal-delete-{{$categoria->idcategoria}}" data-toggle="modal" rel="tooltip" title="Remover del sistema" class="btn btn-danger btn-sm">
                            <i class="fa fa-times"></i>
                          </a>
                          @endcan
    			            </td>
    			        </tr>
                  
    			        @endforeach
    			    </tbody>
			      </table>
            {{ $categorias->links("pagination::bootstrap-4") }}
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer class="footer footer-default">
    @foreach($categorias as $categoria)
    @include('categorias.modal')
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
