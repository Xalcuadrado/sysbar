@extends('layouts.app')
@section('title','Creación de compras')
@section('body-class','profile-page sidebar-collapse')
@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/bg_4.jpg') }}')">
  </div>
  <div class="main main-raised">
    <div class="container">
      <div class="section">
        <h2 class="title text-center">Registrar nueva compra</h2>
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
            {!!Form::open(['url'=>'compras','method'=>'POST','autocomplete'=>'off'])!!}
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
                  <select name="idproveedor" id="idproveedor" class="custom-select" data-live-search="true">
                    <option value="" selected disabled>Seleccione el proveedor</option>
                      @foreach($proveedores as $proveedor)
                        @foreach($empresas as $empresa)
                          @foreach($empresa_users as $eu)
                            @if(auth()->id()==$eu->idusers && $empresa->idempresa==$eu->idempresa && $proveedor->idempresa==$eu->idempresa)
                              <option value="{{$proveedor->idproveedor}}">
                                {{$proveedor->nombre}}
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
                  <br>
                  <select name="t_comprobante" id="t_comprobante" class="custom-select" data-live-search="true">
                    <option value="" selected disabled>Seleccione comprobante</option>
                    <option value="factura">Factura</option>
                    <option value="boleta">Boleta</option>
                    <option value="produccion">Producción</option>
                    </select>
                </div>
              </div>
              <div class="col-sm">
                <div class="form-group">
                  <label for="exampleInput1" class="bmd-label-floating">Número del comprobante</label>
                    <input name="n_comprobante" type="text" class="form-control" id="exampleInput1" autocomplete="off">
                        <span class="bmd-help">Escriba los dígitos que identifica al comprobante</span>
                </div>
              </div>
            </div>
            <hr style="border-top: 2px solid #c49b63; width: 50%">
            <br>
            <div class="row">
              <div class="col-sm">
                <div class="card card-login">
                  <div class="card-header card-header-primary text-center">
                    <h6 class="card-title">Añadir productos a la compra</h6>
                      </div>
                        <div class="card-body">
                          <div class="row">
                            <div class="col-sm">
                              <br>
                                <div class="form-group">
                                  <select name="pidproducto" id="pidproducto" class="custom-select" data-live-search="true">
                                    <option value="" selected disabled>Seleccione el ingrediente</option>
                                    @foreach($productos as $producto)
                                    @foreach($empresas as $empresa)
                                    @foreach($empresa_users as $eu)
                                    @if(auth()->id()==$eu->idusers && $empresa->idempresa==$eu->idempresa && $producto->empresa==$eu->idempresa)
                                    <option value="{{$producto->idproducto}}">{{$producto->producto}}</option>
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
                                <span class="bmd-help">Escriba la cantidad exacta en dígitos</span>
                              </div>
                            </div>
                            <div class="col-sm">
                              <div class="form-group">
                                <label for="pprecio_compra" class="bmd-label-floating">Costo</label>
                                <input type="text" name="pprecio_compra" id="pprecio_compra" class="form-control" autocomplete="off">
                                <span class="bmd-help">Escriba el costo del producto comprado</span>
                              </div>
                            </div>
                            <div class="col-sm">
                              <div class="form-group">
                                <br>
                                <button type="button" id="bt_add" class="btn btn-info btn-round">
                                  <i class="material-icons">add</i> Agregar</button>
                              </div>
                            </div>
                          </div>                   
                        </div>                   
                    </div>
                </div> 
            </div>
            <div class="row">
                <div class="col-sm">
                  <table class="table" id="detalles">
                    <thead>
                        <tr>
                            <th>Acción</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th width="200">Costo</th>
                            <th width="200">Subtotal</th>
                        </tr>
                    </thead>
                    <tfoot>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th>TOTAL</th>
                      <th><h5 id="total" >$ 0</h5></th>
                    </tfoot>
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
                  <a href="{{ url('compras') }}" class="btn btn-danger btn-round">Volver</a>
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
  total=0;
  subtotal=[];

  $("#guardar").hide();

  function agregar()
  {
    idproducto=$("#pidproducto").val();
    producto=$("#pidproducto option:selected").text();
    cantidad=$("#pcantidad").val();
    precio_compra=$("#pprecio_compra").val();

    if (idproducto!="" && cantidad!="" && cantidad>0 && precio_compra!="") 
    {
      subtotal[cont]=(cantidad*precio_compra);
      total=total+subtotal[cont];

      var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning btn-sm" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="idproducto[]" value="'+idproducto+'">'+producto+'</td><td><input style="border: none; width: 60px;" max="9999" type="number" name="cantidad[]" value="'+cantidad+'"></td><td><input type="number" style="border: none; width: 80px;" name="precio_compra[]" value="'+precio_compra+'"></td><td> $ '+subtotal[cont]+'</td></tr>';
      cont++;
      limpiar();
      $("#total").html(" $ " + total);
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
    $("#pprecio_compra").val("");
  }

  function evaluar()
  {
    if (total>0)
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
    total=total-subtotal[index];
    $("#total").html(" $ " + total);
    $("#fila" + index).remove();
    evaluar();
  }

</script>
@endpush
@endsection
