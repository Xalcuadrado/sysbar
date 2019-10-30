@extends('layouts.app')
@section('title','Edición de usuarios')
@section('body-class','profile-page sidebar-collapse')
@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/bg_4.jpg') }}')">
  </div>
  <div class="main main-raised">
    <div class="container">
      <div class="section">
        <h2 class="title text-center">Editar el rol {{ $role->name }}</h2>
      {!!Form::model($role,['method'=>'PUT','route'=>['roles.update',$role->id], 'files'=>'true'])!!}
			{{Form::token()}}
            <div class="row">
              <div class="col-sm">
                  <div class="form-group">
                    <label for="exampleInput1" class="bmd-label-floating">Nombre</label>
                      <input name="name" type="text" class="form-control" id="exampleInput1" autocomplete="off" value="{{ $role->name }}">
                          <span class="bmd-help">Escriba el nombre del rol</span>
                  </div>
                </div>
                <div class="col-sm">
                  <div class="form-group">
                    <label for="exampleInput1" class="bmd-label-floating">dirección URL</label>
                      <input name="slug" type="text" class="form-control" id="exampleInput1" autocomplete="off" value="{{ $role->slug }}">
                          <span class="bmd-help">Escriba un URL amigable</span>
                  </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                    <textarea name="description" class="form-control" placeholder="Escribe una breve descripción del rol" rows="5">{{ $role->description }}</textarea>
                  </div>
                </div>  
            </div>
            <div class="row">
              <div class="col text-center">
                <h5>Permisos especiales</h5>
                  <hr style="border-top: 2px solid #c49b63; width: 25%">
                  @if($role->special=='all-access')
                    <div class="form-check form-check-radio form-check-inline">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="special" id="inlineRadio1" value="all-access" checked> Acceso Total
                        <span class="circle">
                            <span class="check"></span>
                        </span>
                      </label>
                    </div>
                    <div class="form-check form-check-radio form-check-inline">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="special" id="inlineRadio2" value="no-access"> Sin acceso
                        <span class="circle">
                            <span class="check"></span>
                        </span>
                      </label>
                    </div>
                    @elseif($role->special=='no-access')
                    <div class="form-check form-check-radio form-check-inline">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="special" id="inlineRadio1" value="all-access"> Acceso Total
                        <span class="circle">
                            <span class="check"></span>
                        </span>
                      </label>
                    </div>
                    <div class="form-check form-check-radio form-check-inline">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="special" id="inlineRadio2" value="no-access" checked> Sin acceso
                        <span class="circle">
                            <span class="check"></span>
                        </span>
                      </label>
                    </div>
                    @else
                    <div class="form-check form-check-radio form-check-inline">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="special" id="inlineRadio1" value="all-access"> Acceso Total
                        <span class="circle">
                            <span class="check"></span>
                        </span>
                      </label>
                    </div>
                    <div class="form-check form-check-radio form-check-inline">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="special" id="inlineRadio2" value="no-access"> Sin acceso
                        <span class="circle">
                            <span class="check"></span>
                        </span>
                      </label>
                    </div>
                    @endif
              </div>
            </div>
            <h5>Permisos personalizados</h5>
            <hr style="border-top: 2px solid #c49b63; width: 100%">
            <div class="row"> 
              <div class="col-sm">
                <div class="form-group">
                  @foreach($permissions as $permission)
                    <div style="float: right; width: 50%" class="form-check">
                      <label style="color: #c49b63" class="form-check-label">
                      {{ Form::checkbox('permissions[]', $permission->id, null,['class' => 'form-check-input']) }}
                      {{ $permission->name }}
                      <span class="form-check-sign">
                            <span class="check"></span>
                          </span>
                      </label>
                    </div>
                  @endforeach
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm">
                <div class="form-group">
                  <button type="submit" class="btn btn-success btn-round">Crear</button>
                  <a href="{{ url('roles') }}" class="btn btn-danger btn-round">Volver</a>
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
