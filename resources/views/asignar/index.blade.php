@extends('layouts.app')
@section('title','Asignar empresa a usuario')
@section('body-class','profile-page sidebar-collapse')
@section('content')
<div class="page-header header-filter" data-parallax="treu" style="background-image: url('{{ asset('img/bg_4.jpg') }}')">
</div>
  <div class="main main-raised">
    <div class="container">
      <div class="section text-center">
        <h2 class="title">Listado de usuarios pertenecientes a una o más empresas</h2>
          <a href="" data-target="#modal-store" data-toggle="modal" rel="tooltip" title="asignación nueva" class="btn btn-success btn-sm">Asignar
          </a>
      <p></p>
        <div class="team">
          <div class="row">
            <table class="table">
    			    <thead>
    			        <tr>
    			            <th class="text-center">#</th>
    			            <th>Usuario</th>
    			            <th>Empresa</th>
    			            <th class="text-right">Acciones</th>
    			        </tr>
    			    </thead>
    			    <tbody>
    			    	@foreach($empuser as $eu)
    			        <tr>
    			            <td class="text-center">{{ $eu->idempresa_users }}</td>
    			            <td class="text-left">
                        <p>Nombre : {{ $eu->usuario }} {{ $eu->apellido }}</p>
                        <p>Identificación : {{ $eu->t_documento }} - {{ $eu->n_documento }}</p>
                        <p>E-mail : {{ $eu->email }}</p>
                        <p>Teléfono : {{ $eu->telefono }}</p>
                      </td>
    			            <td>{{ $eu->empresa }}</td>
                      <td></td>
    			            <td class="td-actions text-right">
<!--     			                <a href="{{ route('asignar.show', $eu->idempresa_users )}}" rel="tooltip" title="Ver en detalle" class="btn btn-info btn-sm">
    			                    <i class="fa fa-info"></i>
    			                </a> -->
                          <a href="" data-target="#modal-delete-{{$eu->idempresa_users}}" data-toggle="modal" rel="tooltip" title="Remover del sistema" class="btn btn-danger btn-sm">
                            <i class="fa fa-times"></i>
                          </a>
    			            </td>
    			        </tr>
                  
    			        @endforeach
    			    </tbody>
			      </table>
            {{ $empuser->links("pagination::bootstrap-4") }}
          </div>

            <hr style="border-top: 2px solid #c49b63; width: 50%">
          <div class="row">
            <div class="col-sm">
              <table class="table">
              <thead>
                  <tr>
                      <th class="text-center">#</th>
                      <th>Usuarios</th>
                  </tr>
              </thead>
              <tbody>
                @foreach($users as $user)
                  <tr>
                      <td class="text-center">{{ $user->id }}</td>
                      <td>{{ $user->name }} {{ $user->apellido }}</td>
                  </tr>
                  @endforeach
              </tbody>
            </table>
            {{ $users->links("pagination::bootstrap-4") }}
            </div>
                <div class="col-sm">
              <table class="table">
              <thead>
                  <tr>
                      <th class="text-center">#</th>
                      <th>Empresas</th>
                  </tr>
              </thead>
              <tbody>
                @foreach($empresas as $empresa)
                  <tr>
                      <td class="text-center">{{ $empresa->idempresa }}</td>
                      <td>{{ $empresa->nombre }}</td>
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
  </div>
  <footer class="footer footer-default">
    @include('asignar.modalstore')
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
