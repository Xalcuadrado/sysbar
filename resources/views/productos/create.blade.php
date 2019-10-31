@extends('layouts.app')
@section('title','Creación de productos')
@section('body-class','profile-page sidebar-collapse')
@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/bg_4.jpg') }}')">
  </div>
  <div class="main main-raised">
    <div class="container">
      <div class="section">
        <h2 class="title text-center">Registrar nuevo producto</h2>
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
            {!!Form::open(['url'=>'productos','method'=>'POST','autocomplete'=>'off', 'files'=>'true'])!!}
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
                  <br>
                  <select name="idcategoria" id="idcategoria" class="custom-select" data-live-search="true">
                    <option selected disabled>
                      Seleccione la categoría
                    </option>
                    @foreach($categorias as $categoria)
                    <option value="{{$categoria->idcategoria}}">
                      {{$categoria->nombre}}
                    </option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm">
                <div class="form-group">
                  <label for="exampleInput1" class="bmd-label-floating">Código</label>
                    <input name="codigo" type="text" class="form-control" id="exampleInput1" autocomplete="off">
                        <span class="bmd-help">Escriba el código del producto</span>
                </div>
              </div>
              <div class="col-sm">
                  <div class="form-group">
                    <label for="exampleInput1" class="bmd-label-floating">Nombre</label>
                      <input name="nombre" type="text" class="form-control" id="exampleInput1" autocomplete="off">
                          <span class="bmd-help">Escriba el nombre del producto</span>
                  </div>
              </div>
              <div class="col-sm">
                  <div class="form-group">
                    <label for="exampleInput1" class="bmd-label-floating">Precio</label>
                      <input name="precio" type="text" class="form-control" id="exampleInput1" autocomplete="off">
                          <span class="bmd-help">Escriba el precio del producto</span>
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm">
                  <div class="form-group">
                    <label for="exampleInput1" class="bmd-label-floating">Stock Actual</label>
                      <input name="stock" type="text" class="form-control" id="exampleInput1" autocomplete="off">
                          <span class="bmd-help">Escriba el stock del producto o en otro caso un 0</span>
                  </div>
              </div>
              <div class="col-sm">
                  <label class="bmd-label-floating">Adjunte una imagen referencial</label>
                    <input type="file" name="imagen" class="form-control">
              </div>
              <div class="col-sm">
                <div class="form-group">
                    <textarea name="descripcion" class="form-control" placeholder="Escribe una breve descripción del producto" rows="5"></textarea>
                </div>
              </div> 
            </div>
            <hr style="border-top: 2px solid #c49b63; width: 50%">
            <br>
            <div class="row">
              <div class="col-sm">
                <div class="card card-login">
                  <div class="card-header card-header-primary text-center">
                    <h6 class="card-title">Añadir Ingredientes</h6>
                  </div>
                  <div class="card-body">
                      <div class="row">
                        <div class="col-sm">
                          <br>
                          <div class="form-group">
                            <select name="pidingrediente" id="pidingrediente" class="custom-select" data-live-search="true">
                              <option value="" selected disabled>Seleccione el ingrediente</option>
                                @foreach($ingredientes as $ingrediente)
                                  @foreach($empresas as $empresa)
                                    @foreach($empresa_users as $eu)
                                      @if(auth()->id()==$eu->idusers && $empresa->idempresa==$eu->idempresa && $ingrediente->idempresa==$eu->idempresa)
                                        <option value="{{$ingrediente->idingrediente}}">
                                          {{$ingrediente->nombre}}
                                        </option>
                                      @endif
                                    @endforeach
                                  @endforeach
                                @endforeach
                            </select>   
                          </div>
                        </div>
                        <div class="col-sm">
                          <div class="form-group">
                            <label for="pcantidad" class="bmd-label-floating">Cantidad</label>
                              <input name="pcantidad" type="text" class="form-control" id="pcantidad" autocomplete="off">
                                <span class="bmd-help">Escriba porción del ingrediente o estimelo</span>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm">
                        </div>
                        <div class="col-sm">
                          <button type="button" id="bt_add" class="btn btn-info btn-round">Añadir Ingrediente</button>
                        </div>
                      </div>                   
                  </div>                   
                </div>
              </div>
              <div class="col-sm">
                <table class="table" id="detalles">
                  <thead>
                      <tr>
                          <th>Ingrediente</th>
                          <th>Porción</th>
                          <th>Acción</th>
                      </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div> 
            </div>
            <div class="row">
              <div class="col-sm">
                <div class="form-group" id="guardar">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <button type="submit" class="btn btn-success btn-round">Crear</button>
                  <a href="{{ url('productos') }}" class="btn btn-danger btn-round">Volver</a>
                </div>
              </div>
            </div>
            {!!Form::close()!!}
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
  @push ('scripts')
<script>

  $(document).ready(function()
  {
    $('#bt_add').click(function()
    {
      agregar();
    });
  });

  var cont=0;
  var habilitar=0;

  $("#guardar").hide();

  function agregar()
  {
    idingrediente=$("#pidingrediente").val();
    nombre=$("#pidingrediente option:selected").text();
    cantidad=$("#pcantidad").val();

    if (idingrediente!="" && cantidad!="") 
    {
      var fila='<tr class="selected" id="fila'+cont+'"><td><input type="hidden" name="idingrediente[]" value="'+idingrediente+'">'+nombre+'</td><td><input style="background: transparent;" type="text" class="form-control" name="cantidad[]" value="'+cantidad+'"></td><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar('+cont+');">X</button></td>';
      cont++;
      habilitar++;
      limpiar();
      evaluar();
      $('#detalles').append(fila);
    }
    else
    {
      alert("Hubo un error al ingresar el detalle del ingreso, revise que los datos que escribió sean correctos.");
    }
  }

  function limpiar()
  {
    $("#pcantidad").val("");
  }

  function evaluar()
  {
    if (habilitar>0)
    {
      $("#guardar").show();
    }
    else
    {
      $("#guardar").hide();
    }
  }

  function eliminar(index)
  {
    $("#fila" + index).remove();
    habilitar--;
    evaluar();
  }

</script>
@endpush
@endsection
