@extends('layouts.app')
@section('title','Edición de usuarios')
@section('body-class','profile-page sidebar-collapse')
@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/bg_4.jpg') }}')">
  </div>
  <div class="main main-raised">
    <div class="container">
      <div class="section">
        <h2 class="title text-center">Editar usuario</h2>
        <h4 class="text-center description">Estás tratando de editar datos del usuario <strong>{{ $user->name }} {{ $user->apellido }}</strong></h4>
          <div class="row">
            <div style="text-align: center;" class="col-sm">
              <div class="form-group">
                <img style="width: 100px; height: 100px; border-radius: 80px;" src="{{asset('imagenes/users/'.$user->foto)}}" alt="{{ $user->name}}" class="img-thumbnail">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm text-center">
              @foreach($roles as $r)
                  @foreach($user_rol as $ur)
                    @if($user->id==$ur->user_id && $r->id==$ur->role_id)
                      <h3 class="label">{{ $r->name }}</h3>
                    @endif
                  @endforeach
                @endforeach
            </div>
          </div>
        <h5 class="text-center description"> [ identificación {{ $user->n_documento }} ] </h5>
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
      {!!Form::model($user,['method'=>'PUT','route'=>['users.update',$user->id], 'files'=>'true'])!!}
			{{Form::token()}}
            <div class="row">
              <div class="col-sm text-right">
                <label class="label" >Datos personales</label>
              </div>
              <div class="col-sm">
                  <div class="form-group">
                    <label for="exampleInput1" class="bmd-label-floating">Nombre</label>
                      <input name="name" type="text" class="form-control" id="exampleInput1" autocomplete="off" value="{{ $user->name }}">
                          <span class="bmd-help">Escriba el nombre del usuario</span>
                  </div>
                </div>
                <div class="col-sm">
                    <div class="form-group">
                    <label for="exampleInput1" class="bmd-label-floating">Apellido</label>
                      <input name="apellido" type="text" class="form-control" id="exampleInput1" autocomplete="off" value="{{ $user->apellido }}">
                          <span class="bmd-help">Escriba el apellido del usuario</span>
                  </div>
                </div> 
            </div>
            <div class="row">
              <div class="col-sm text-right">
                <label class="label" >Contacto</label>
              </div>
              <div class="col-sm">
                  <div class="form-group">
                    <label for="exampleInput1" class="bmd-label-floating">E-Mail</label>
                      <input name="email" type="email" class="form-control" id="exampleInput1" autocomplete="off" value="{{ $user->email }}">
                          <span class="bmd-help">Escriba el correo electrónico</span>
                  </div>
                </div>
                <div class="col-sm">
                    <div class="form-group">
                    <label for="exampleInput1" class="bmd-label-floating">Teléfono</label>
                      <input name="telefono" type="text" class="form-control" id="exampleInput1" autocomplete="off" value="{{ $user->telefono }}">
                          <span class="bmd-help">Escriba el teléfono del usuario</span>
                  </div>
                </div> 
            </div>
            <div class="row">
              <div class="col-sm text-right">
                <label class="label" >Cambiar Foto</label>
              </div>
              <div class="col-sm">
                <label class="bmd-label-floating">Actualizar foto de perfil</label>
                    <input type="file" name="foto" class="form-control"> 
              </div>
              <div style="font-size: 0.8em; color: red;" class="col-sm">
                <li>No usar fotos inadecuadas</li>
                <li>Sólo se permiten imagenes en formato jpeg y png</li>
              </div>
            </div>
            <hr style="border-top: 2px solid #c49b63; width: 50%">
            <div class="row">
              <div class="col-sm">
                <h3 class="text-center description">Listado de roles para asignar</h3>
                  @foreach ($roles as $r)
                    <p>
                      <label>
                        {{ Form::checkbox('roles[]', $r->id, null) }}
                        {{ $r->name }}
                        <em>( {{ $r->description ?: 'N/A' }} )</em>
                      </label>
                    </p>
                  @endforeach
              </div>
            </div>
            <div class="row">
              <div class="col-sm">
                <div class="form-group">
                  <button type="submit" class="btn btn-success btn-round">Guardar</button>
                  <a href="{{ url('users') }}" class="btn btn-danger btn-round">Volver</a>
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
