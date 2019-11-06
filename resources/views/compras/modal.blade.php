<div class="modal fade" id="modal-delete-{{$compra->idcompra}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	{{Form::Open(['action'=>array('CompraController@destroy', $compra->idcompra),'method'=>'delete'])}}
	<div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Cambiar estado de la compra</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <p>Confirme si desea anular la compra con número de comprobante : {{ $compra->n_comprobante }}, <strong style="color: red;">al confirmar no se podrá realizar ninguna acción más sobre esta</strong> </p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
	        <button type="submit" class="btn btn-primary">Confirmar</button>
	      </div>
	    </div>
	</div>
	{{Form::Close()}}
</div>
