@extends('layouts.app')
@section('title','Edición de empresas')
@section('body-class','profile-page sidebar-collapse')
@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/bg_4.jpg') }}')">
  </div>
  <div class="main main-raised">
    <div class="container">
      <div class="section">
        <h2 class="title text-center">Editar empresa</h2>
        <h4 class="text-center description">Estás tratando de editar datos de la empresa <strong>{{ $empresa->nombre }}</strong> </h4>
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
            {!!Form::model($empresa,['method'=>'PUT','route'=>['empresas.update',$empresa->idempresa], 'files'=>'true'])!!}
			{{Form::token()}}
            <div class="row">
              <div class="col-sm">
                  <div class="form-group">
                    <label for="exampleInput1" class="bmd-label-floating">Nombre</label>
                      <input name="nombre" type="text" class="form-control" id="exampleInput1" autocomplete="off" value="{{ $empresa->nombre }}">
                          <span class="bmd-help">Escriba el nombre de la empresa o álias</span>
                  </div>
                </div>
                <div class="col-sm">
                    <label class="bmd-label-floating">Adjunte una imagen</label>
                    <input type="file" name="logo" class="form-control"> 
                </div>
                <div class="col-sm">
                    <label class="bmd-label-floating">Logo actual</label>
                	<img width="50px" height="50px" src="{{asset('imagenes/empresas/'.$empresa->logo)}}" class="img-raised rounded-circle img-fluid">
                </div>  
            </div>
            <div class="row">
              <div class="col-sm">
                <div class="form-group">
                  <button type="submit" class="btn btn-success btn-round">Guardar</button>
                  <a href="{{ url('empresas') }}" class="btn btn-danger btn-round">Volver</a>
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
