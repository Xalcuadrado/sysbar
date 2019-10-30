<div class="modal fade" id="modal-delete-{{$categoria->idcategoria}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	{{Form::Open(['action'=>array('CategoriaController@destroy', $categoria->idcategoria),'method'=>'delete'])}}
	<div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Remover categoria</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <p>Confirme si desea eliminar la categoria {{ $categoria->nombre }}</p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
	        <button type="submit" class="btn btn-primary">Confirmar</button>
	      </div>
	    </div>
	</div>
	{{Form::Close()}}
</div>
