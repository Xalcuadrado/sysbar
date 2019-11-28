<div class="modal fade" id="modal-edit-{{$order->idcart}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    {!!Form::model($order,['method'=>'PUT','route'=>['orders.update',$order->idcart]])!!}
	{{Form::token()}}
	<div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title h5" id="exampleModalLabel">Evaluar orden</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      	<div class="row">
	      		<div class="col-sm text-left">
	      			<label class="btn btn-warning btn-sm">{{ $order->status }}</label>
	      			<h6 class="h6">N° de pedido : {{ $order->idcart }}</h6>
	      			<h6 class="h6">Usuario : {{ $order->usuario }} {{ $order->apellido }}</h6>
	      		</div>
	      	</div>
	      	<div class="row">
	      	<table class="table">
            <thead>
                <tr>
                    <th class="text-center">Referencia</th>
                    <th>Producto</th>
                    <th style="width: 100px;" >Precio</th>
                    <th style="width: 50px;">+</th>
                    <th class="text-right" style="width: 100px;">Subtotal</th>
                </tr>
            </thead> 
            <tbody>
          @foreach ($cartdetails as $details)
          	@if($details->cart_id == $order->idcart)
              <tr>
                <td class="text-center">
                	<img width="50px" height="50px" src="{{asset('imagenes/productos/'.$details->imagen)}}" alt="Circle Image" class="img-raised img-thumbnail img-fluid">
                </td>
                <td>{{ $details->producto }}</td>
                <td>{{ $details->precio }}</td>
                <td>{{ $details->cantidad }}</td>
                <td class="text-right">{{ $details->precio * $details->cantidad }}</td>
              </tr>
              @endif
          @endforeach
            </tbody>
            <tfoot>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td class="text-right"><strong>TOTAL</strong></td>
            @foreach ($cart as $car)
	          	@if($car->id == $order->idcart)
	                <td class="text-right"><strong>{{ $car->total }}</strong></td>
	            @endif
         	@endforeach
                <td></td>
              </tr>
              
            </tfoot>
        </table>
	      	</div>
	      </div>
	      <div class="modal-footer">
	      		<select class="custom-select" name="status">
	      			<option value="" selected disabled>Seleccione la opción</option>
		      		<option value="finalizado">Finalizado</option>
	      		</select>
		        <button type="submit" class="btn btn-primary">Confirmar</button>
	      </div>
	    </div>
	</div>
	{{Form::Close()}}
</div>
