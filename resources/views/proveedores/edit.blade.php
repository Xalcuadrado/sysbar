@extends('layouts.app')
@section('title','Edición de proveedores')
@section('body-class','profile-page sidebar-collapse')
@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/bg_4.jpg') }}')">
  </div>
  <div class="main main-raised">
    <div class="container">
      <div class="section">
        <h2 class="title text-center">Editar proveedor</h2>
        <h4 class="text-center description">Estás tratando de editar datos del proveedor <strong>{{ $proveedor->nombre }}</strong> </h4>
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
      {!!Form::model($proveedor,['method'=>'PUT','route'=>['proveedores.update',$proveedor->idproveedor]])!!}
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
              <div class="col-sm"></div>
            </div>
                        <div class="row">
              <div class="col-sm">
                <div class="form-group">
                  <br>
                  <select name="t_documento" id="t_documento" class="custom-select" data-live-search="true">
                    @if($proveedor->t_documento=='RUT')
                    <option selected disabled>Seleccione Tipo de Identificación</option>
                    <option value="RUT" selected>RUT Personal</option>
                    <option value="RUN">RUN Empresarial</option>
                    @else
                    <option selected disabled>Seleccione Tipo de Identificación</option>
                    <option value="RUT">RUT Personal</option>
                    <option value="RUN" selected>RUN Empresarial</option>
                    @endif
                  </select>
                </div>
              </div>
              <div class="col-sm">
                  <div class="form-group">
                    <label for="exampleInput1" class="bmd-label-floating">Número de Identificación</label>
                      <input name="n_documento" type="text" class="form-control" id="exampleInput1" autocomplete="off" value="{{ $proveedor->n_documento }}">
                          <span class="bmd-help">Escriba los dígitos de la identificación del proveedor</span>
                  </div>
                </div>
                <div class="col-sm">
                  <div class="form-group">
                    <label for="exampleInput1" class="bmd-label-floating">Nombre</label>
                      <input name="nombre" type="text" class="form-control" id="exampleInput1" autocomplete="off" value="{{ $proveedor->nombre }}">
                          <span class="bmd-help">Escriba el nombre del proveedor</span>
                  </div>
                </div>
            </div>
            <div class="row">
              <div class="col-sm">
                  <div class="form-group">
                    <label for="exampleInput1" class="bmd-label-floating">Teléfono</label>
                      <input name="telefono" type="text" class="form-control" id="exampleInput1" autocomplete="off" value="{{ $proveedor->telefono }}">
                          <span class="bmd-help">Escriba el teléfono del proveedor</span>
                  </div>
              </div>
              <div class="col-sm">
                  <div class="form-group">
                    <label for="exampleInput1" class="bmd-label-floating">E-mail</label>
                      <input name="email" type="text" class="form-control" id="exampleInput1" autocomplete="off" value="{{ $proveedor->email }}">
                          <span class="bmd-help">Escriba el correo electrónico del proveedor</span>
                  </div>
                </div>
                <div class="col-sm">
                  <div class="form-group">
                    <label for="exampleInput1" class="bmd-label-floating">Dirección</label>
                      <input name="direccion" type="text" class="form-control" id="exampleInput1" autocomplete="off" value="{{ $proveedor->direccion }}">
                          <span class="bmd-help">Escriba el dirección del proveedor</span>
                  </div>
                </div>
            </div>
            <div class="row">
              <div class="col-sm">
                <div class="form-group">
                  <button type="submit" class="btn btn-success btn-round">Guardar</button>
                  <a href="{{ url('proveedores') }}" class="btn btn-danger btn-round">Volver</a>
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
