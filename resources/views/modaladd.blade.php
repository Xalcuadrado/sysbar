<div class="modal fade" id="modal-addcart-{{$producto->idproducto}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document" style="margin: auto;">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">{{ $producto->producto }}</h5>        
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	    <form method="post" action="{{ url('/cart') }}">
	      	{{ csrf_field() }}
		      <div class="modal-body">
		      	<div class="row">
		      		<div class="col-sm">
		      			<img height="200px" src="{{asset('imagenes/productos/'.$producto->imagen)}}" alt="Thumbnail Image" class="img-raised img-thumbnail img-fluid">
		      		</div>
		      		<div class="col-sm">
		      			<div class="row">
		      				<label class="label">Precio : $ {{ $producto->precio }}</label>
		      			</div>
		      			<div class="row">
		      				<label class="label">Disponibles : {{ $producto->stock }}</label>
		      			</div>
		      			<div class="row">
		      				<label class="label">Categoría : {{ $producto->categoria }}</label>
		      			</div>
		      			<div class="row">
		      				<label class="label">Descripción : {{ $producto->descripcion }}</label>
		      			</div>
		      		</div>
		      	</div>
		      	<div class="row" style="margin-left: 20%; margin-right: 20%">
		      		<input type="hidden" name="product_id" value="{{ $producto->idproducto }}">
		      		<input type="number" name="cantidad" value="1" min="1" max="20">
		      	</div>
		      	<hr style="border-top: 2px solid #c49b63; width: 50%">
		      	<div class="row">
	              <div class="col-sm">
	              		<a class="btn btn-primary" data-toggle="collapse" href="#multiCollapse{{ $producto->idproducto }}" role="button" aria-expanded="false" aria-controls="multiCollapse{{ $producto->idproducto }}">Ingredientes</a>
	              </div>
	            </div>
	            @include('products.detalles')
		      </div>
	      	<div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Volver</button>
		        <button class="btn btn-success" type="submit">
	                  <i class="material-icons">shopping_cart</i> Agregar al Carrito
	            </button>
	      	</div>
	      </form>
	    </div>
	</div>
</div>