@extends('layouts.app')
@section('title','Lista de usuarios')
@section('body-class','profile-page sidebar-collapse')
@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/bg_4.jpg') }}')">
</div>
  <div class="main main-raised">
    <div class="container">
      <div class="section text-center">
        <h2 class="title">Listado de usuarios</h2>
      <p></p>
      <div class="row">
          <div class="col-sm">
            @include('users.search')
          </div>
        </div>
        <div class="team">
          <div class="row">
            <table class="table">
    			    <thead>
    			        <tr>
    			            <th class="text-center">#</th>
    			            <th style="width: 150px;">Nombre</th>
    			            <th>Foto</th>
                      <th>Documento</th>
                      <th>Contacto</th>
    			            <th class="text-right">Acciones</th>
    			        </tr>
    			    </thead>
    			    <tbody>
    			    	@foreach($users as $user)
    			        <tr>
    			            <td class="text-center">{{ $user->id }}</td>
    			            <td>{{ $user->name }} {{ $user->apellido }}</td>
    			            <td><img style="width:  70px; height: 70px;" src="{{asset('imagenes/users/'.$user->foto)}}" alt="{{ $user->name}}" class="img-raised rounded-circle img-fluid"></td>
                      <td>
                        <input type="hidden" name="t_documento" value="{{ $user->t_documento}}">
                        @if($user->t_documento=='pass')
                        <img src="{{asset('img/worldwide.png')}}">
                        @else
                        <img src="{{asset('img/chile.png')}}">
                        @endif
                        &nbsp;:&nbsp;{{ $user->n_documento}}
                      </td>
                      <td>
                        <li>{{ $user->telefono }}</li>
                        <li>{{ $user->email }}</li>
                      </td>
    			            <td class="td-actions text-right">
                          @can('users.show')
    			                <a href="{{ route('users.show', $user->id )}}" rel="tooltip" title="Ver en detalle" class="btn btn-info btn-sm">
    			                    <i class="fa fa-info"></i>
    			                </a>
                          @endcan
                          @can('users.edit')
    			                <a href="{{ route('users.edit', $user->id )}}" rel="tooltip" title="Editar datos" class="btn btn-success btn-sm">
    			                    <i class="fa fa-edit"></i>
    			                </a>
                          @endcan
                          @can('users.destroy')
                          <a href="" data-target="#modal-delete-{{$user->id}}" data-toggle="modal" rel="tooltip" title="Remover del sistema" class="btn btn-danger btn-sm">
                            <i class="fa fa-times"></i>
                          </a>
                          @endcan
    			            </td>
    			        </tr>
                  
    			        @endforeach
    			    </tbody>
			      </table>
            {{ $users->links("pagination::bootstrap-4") }}
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer class="footer footer-default">
    @foreach($users as $user)
    @include('users.modal')
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
