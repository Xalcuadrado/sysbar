@extends('layouts.app')
@section('title','Lista de roles')
@section('body-class','profile-page sidebar-collapse')
@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/bg_4.jpg') }}')">
</div>
  <div class="main main-raised">
    <div class="container">
      <div class="section text-center">
        <h2 class="title">Listado de roles</h2>
        @can('roles.create')
         <a href="{{ url('/roles/create') }}" class="btn btn-primary btn-round">Nuevo rol</a>
        @endcan
      <p></p>
      @if (session('notificacion'))
            <div class="alert alert-success">
              {{ session('notificacion') }}
            </div>
          @endif
      <div class="row">
          <div class="col-sm">
            @include('roles.search')
          </div>
        </div>
        <div class="team">
          <div class="row">
            <table class="table">
    			    <thead>
    			        <tr>
    			            <th class="text-center">#</th>
    			            <th style="width: 150px;">Nombre</th>
    			            <th>Descripción</th>
    			            <th class="text-right">Acciones</th>
    			        </tr>
    			    </thead>
    			    <tbody>
    			    	@foreach($roles as $role)
    			        <tr>
    			            <td class="text-center">{{ $role->id }}</td>
    			            <td>{{ $role->name }}</td>
                      <td>{{ $role->description }}</td>
    			            <td class="td-actions text-right">
                          @can('roles.show')
    			                <a href="{{ route('roles.show', $role->id )}}" rel="tooltip" title="Ver en detalle" class="btn btn-info btn-sm">
    			                    <i class="fa fa-info"></i>
    			                </a>
                          @endcan
                          @can('roles.edit')
    			                <a href="{{ route('roles.edit', $role->id )}}" rel="tooltip" title="Editar datos" class="btn btn-success btn-sm">
    			                    <i class="fa fa-edit"></i>
    			                </a>
                          @endcan
                          @can('roles.destroy')
                          <a href="" data-target="#modal-delete-{{$role->id}}" data-toggle="modal" rel="tooltip" title="Remover del sistema" class="btn btn-danger btn-sm">
                            <i class="fa fa-times"></i>
                          </a>
                          @endcan
    			            </td>
    			        </tr>
                  
    			        @endforeach
    			    </tbody>
			      </table>
            {{ $roles->links("pagination::bootstrap-4") }}
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer class="footer footer-default">
    @foreach($roles as $role)
    @include('roles.modal')
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
