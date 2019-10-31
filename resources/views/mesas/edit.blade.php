@extends('layouts.app')
@section('title','Edición de mesas')
@section('body-class','profile-page sidebar-collapse')
@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/bg_4.jpg') }}')">
  </div>
  <div class="main main-raised">
    <div class="container">
      <div class="section">
        <h2 class="title text-center">Editar mesa</h2>
        <h4 class="text-center description">Estás tratando de editar datos de la mesa <strong>{{ $mesa->nombre }}</strong> </h4>
        <hr style="border-top: 2px solid #c49b63; width: 50%">
	        <div class="row">
				<div class="col-sm">
					@if (count($errors)>0)
						<div class="alert alert-danger">
							<ul>
							@foreach ($errors->all() as $error)
							<li>{{$error}}</li>
							@endforeach
							</ul>
						</div>
					@endif
				</div>
			</div>
      {!!Form::model($mesa,['method'=>'PUT','route'=>['mesas.update',$mesa->idmesa]])!!}
			{{Form::token()}}
            <div class="row">
              <div class="col-sm">
                <div class="form-group">
                  <br>
                  <select name="idempresa" id="idempresa" class="custom-select" data-live-search="true">
                    @foreach($empresas as $empresa)
                      @foreach($empresa_users as $eu)
                        @if(auth()->id()==$eu->idusers && $empresa->idempresa==$eu->idempresa)
                    <option value="{{$empresa->idempresa}}" selected>
                      {{$empresa->nombre}}
                    </option>
                        @endif
                      @endforeach
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-sm">
                </div>
            </div>
            <div class="row">
              <div class="col-sm">
                  <div class="form-group">
                    <label for="exampleInput1" class="bmd-label-floating">Código</label>
                      <input name="codigo" type="text" class="form-control" id="exampleInput1" autocomplete="off" value="{{ $mesa->codigo }}">
                          <span class="bmd-help">Escriba un código númerico inicial, este cambiará dinámicamente</span>
                  </div>
                </div>
                <div class="col-sm">
                  <div class="form-group">
                    <label for="exampleInput1" class="bmd-label-floating">Nombre</label>
                      <input name="nombre" type="text" class="form-control" id="exampleInput1" autocomplete="off" value="{{ $mesa->nombre }}">
                          <span class="bmd-help">Escriba el nombre de la mesa</span>
                  </div>
                </div>
            </div>
            <div class="row">
              <div class="col-sm">
                <div class="form-group">
                  <button type="submit" class="btn btn-success btn-round">Guardar</button>
                  <a href="{{ url('mesas') }}" class="btn btn-danger btn-round">Volver</a>
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
