@extends('layouts.app')
@section('title','Creación de ingredientes')
@section('body-class','profile-page sidebar-collapse')
@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/bg_4.jpg') }}')">
  </div>
  <div class="main main-raised">
    <div class="container">
      <div class="section">
        <h2 class="title text-center">Registrar nuevo ingrediente</h2>
            {!!Form::open(['url'=>'ingredientes','method'=>'POST','autocomplete'=>'off'])!!}
            {{Form::token()}}
            <div class="row">
            	<div class="col-sm">
      					<div class="form-group">
      						<br>
      						<select name="idempresa" id="idempresa" class="custom-select" data-live-search="true">
      							<option selected disabled>
      								Seleccione la empresa
      							</option>
      							@foreach($empresas as $empresa)
      								@foreach($empresa_users as $eu)
      									@if(auth()->id()==$eu->idusers && $empresa->idempresa==$eu->idempresa)
      							<option value="{{$empresa->idempresa}}">
      								{{$empresa->nombre}}
      							</option>
      									@endif
      								@endforeach
      							@endforeach
      						</select>
      					</div>
      			  </div>
              <div class="col-sm">
                  <div class="form-group">
                    <label for="exampleInput1" class="bmd-label-floating">Nombre</label>
                      <input name="nombre" type="text" class="form-control" id="exampleInput1" autocomplete="off">
                          <span class="bmd-help">Escriba el nombre o descripción del ingrediente</span>
                  </div>
                </div>
            </div>
            <div class="row">
              <div class="col-sm">
                <div class="form-group">
                  <button type="submit" class="btn btn-success btn-round">Crear</button>
                  <a href="{{ url('ingredientes') }}" class="btn btn-danger btn-round">Volver</a>
                  </div>
                </div>
              </div>
            </div> 
            {!!Form::close()!!}
        </div>
      </div>
    </div>
  </div>
  <footer class="footer footer-default">
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
