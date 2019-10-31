@extends('layouts.app')
@section('title','Edición de productos')
@section('body-class','profile-page sidebar-collapse')
@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/bg_4.jpg') }}')">
  </div>
  <div class="main main-raised">
    <div class="container">
      <div class="section">
        <h2 class="title text-center">Editar producto</h2>
        <p class="text-center">
          <img style="width: 100px; height: 100px;" src="{{asset('imagenes/productos/'.$producto->imagen)}}" alt="{{ $producto->nombre}}" class="img-raised img-thumbnail img-fluid">
        </p>
        <h4 class="text-center description">Estás tratando de editar datos del producto <strong>{{ $producto->nombre }}</strong> </h4>
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
      {!!Form::model($producto,['method'=>'PUT','route'=>['productos.update',$producto->idproducto],'files'=>'true'])!!}
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
                <div class="form-group">
                  <br>
                  <select name="idcategoria" id="idcategoria" class="custom-select" data-live-search="true">
                    @foreach($categorias as $categoria)
                      @if($categoria->idcategoria==$producto->idcategoria)
                          <option value="{{$categoria->idcategoria}}" selected>
                              {{$categoria->nombre}}
                          </option>
                          @else
                          <option value="{{$categoria->idcategoria}}">
                              {{$categoria->nombre}}
                          </option>
                      @endif
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm">
                <div class="form-group">
                  <label for="exampleInput1" class="bmd-label-floating">Código</label>
                    <input name="codigo" type="text" class="form-control" id="exampleInput1" autocomplete="off" value="{{ $producto->codigo }}">
                        <span class="bmd-help">Escriba el código del producto</span>
                </div>
              </div>
              <div class="col-sm">
                  <div class="form-group">
                    <label for="exampleInput1" class="bmd-label-floating">Nombre</label>
                      <input name="nombre" type="text" class="form-control" id="exampleInput1" autocomplete="off" value="{{ $producto->nombre }}">
                      <span class="bmd-help">Escriba el nombre de la producto</span>
                </div>
              </div>
              <div class="col-sm">
                  <div class="form-group">
                    <label for="exampleInput1" class="bmd-label-floating">Precio</label>
                      <input name="precio" type="text" class="form-control" id="exampleInput1" autocomplete="off" value="{{ $producto->precio }}">
                          <span class="bmd-help">Escriba el precio del producto</span>
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm">
                  <div class="form-group">
                    <label for="exampleInput1" class="bmd-label-floating">Stock Actual</label>
                      <input name="stock" type="text" class="form-control" id="exampleInput1" autocomplete="off" value="{{ $producto->stock }}">
                          <span class="bmd-help">Escriba el stock del producto o en otro caso un 0</span>
                  </div>
              </div>
              <div class="col-sm">
                  <label class="bmd-label-floating">Adjunte una imagen referencial</label>
                    <input type="file" name="imagen" class="form-control">
              </div>
              <div class="col-sm">
                <div class="form-group">
                    <textarea name="descripcion" class="form-control" placeholder="Escribe una breve descripción del producto" rows="5">{{ $producto->descripcion }}</textarea>
                </div>
              </div> 
            </div>
            <div class="row">
              <div class="col-sm">
                <div class="form-group">
                  <button type="submit" class="btn btn-success btn-round">Guardar</button>
                  <a href="{{ url('productos') }}" class="btn btn-danger btn-round">Volver</a>
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
