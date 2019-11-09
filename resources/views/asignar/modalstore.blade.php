<div class="modal fade" id="modal-store" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document" style="margin: auto;">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Nueva Asignación de empresa a usuario</h5>        
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	    <form method="post" action="{{ url('/asignar') }}">
	      	{{ csrf_field() }}
		      <div class="modal-body">
		      	<div class="row">
		      		<div class="col-sm">
		      			<select class="custom-select" name="idempresa">
		      				<option value="" selected disabled>Selecione la empresa</option>
		      				@foreach($empresas as $empresa)
		      				<option value="{{ $empresa->idempresa }}" >{{ $empresa->nombre }}</option>
		      				@endforeach
		      			</select>
		      		</div>
		      		<div class="col-sm">
		      			<select class="custom-select" name="idusers">
		      				<option value="" selected disabled>Selecione al usuario</option>
		      				@foreach($users as $user)
		      				<option value="{{ $user->id }}" >{{ $user->n_documento }} : {{ $user->name }} {{ $user->apellido}}</option>
		      				@endforeach
		      			</select>
		      		</div>
		      	</div>
		      </div>
	      	<div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Volver</button>
		        <button class="btn btn-success" type="submit">
	                  <i class="material-icons">sync_alt</i> Sincronizar
	            </button>
	      	</div>
	      </form>
	    </div>
	</div>
</div>