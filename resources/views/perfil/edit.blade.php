<div class="modal fade bd-example-modal-lg" id="modal-edit-{{Auth::user()->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    {!!Form::model($user,['method'=>'PUT','route'=>['perfil.update',$user->id], 'files'=>'true'])!!}
	{{Form::token()}}
	<div class="modal-dialog modal-lg">
    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title h5" id="exampleModalLabel">Configuración de información</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      	<div class="row">
	      		<div class="col-sm text-left">
	      			<p class="label">Hola, {{ $user->name }} {{ $user->apellido }}. estas intentando actualizar tus datos. Si necesitas actualizar tu identificación deberás comunicarte con <a href="">nosotros</a>, ya que esta información es más sencible a los demás.</p>
	      		</div>
	      	</div>
	      	<hr style="border-top: 2px solid #c49b63; width: 50%">
	      	<div class="row">
	      		<div class="col-sm text-right">
                <label class="h6" >Datos Personales</label>
              </div>
	      		<div class="col-sm">
	      			<div class="form-group">
	      				<label for="exampleInput1" class="bmd-label-floating">Nombre</label>
                      <input name="name" type="text" class="form-control" id="exampleInput1" autocomplete="off" value="{{ $user->name }}">
                          <span class="bmd-help">Primer nombre</span>
	      			</div>
	      		</div>
	      		<div class="col-sm">
	      			<div class="form-group">
	      				<label for="exampleInput1" class="bmd-label-floating">Apellido</label>
                      <input name="apellido" type="text" class="form-control" id="exampleInput1" autocomplete="off" value="{{ $user->apellido }}">
                          <span class="bmd-help">Apellido paterno</span>
	      			</div>
	      		</div>
	      	</div>
	      	<div class="row">
	      	  <div class="col-sm text-right">
                <label class="h6" >Contacto</label>
              </div>
              <div class="col-sm">
                  <div class="form-group">
                    <label for="exampleInput1" class="bmd-label-floating">E-Mail</label>
                      <input name="email" type="email" class="form-control" id="exampleInput1" autocomplete="off" value="{{ $user->email }}">
                          <span class="bmd-help">Correo electrónico</span>
                  </div>
                </div>
                <div class="col-sm">
                    <div class="form-group">
                    <label for="exampleInput1" class="bmd-label-floating">Teléfono</label>
                      <input name="telefono" type="text" class="form-control" id="exampleInput1" autocomplete="off" value="{{ $user->telefono }}">
                          <span class="bmd-help">Ejemplo +56 9 45520400</span>
                  </div>
                </div> 
	      	</div>
	      	<div class="row">
	      	   <div class="col-sm text-right">
                <label class="h6" >Cambiar foto</label>
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
	      </div>
	      <div class="modal-footer">
	      	<div class="form-group">
	      		<button type="button" class="btn btn-danger btn-round btn-sm" data-dismiss="modal">Cerrar</button>
		        <button type="submit" class="btn btn-warning btn-round btn-sm">Guardar Cambios</button>
	      	</div>
	      </div>
	    </div>
	</div>
	{{Form::Close()}}
</div>