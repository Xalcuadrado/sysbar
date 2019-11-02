<div class="modal fade" id="modalAddToCart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Seleccione la cantidad</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <form method="post" action="{{ url('/cart') }}">
	      	{{ csrf_field() }}
	      	<div class="modal-body">
	      		<div class="row" style="margin-left: 20%; margin-right: 20%;">
	      			<input type="hidden" name="product_id" value="{{ $producto->idproducto }}">
	      			<input type="number" name="cantidad" value="1" min="1" max="10">
	      		</div>
		    </div>
		    <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
		        <button type="submit" class="btn btn-primary">Confirmar</button>
		    </div>
	      </form>
	    </div>
	</div>
</div>