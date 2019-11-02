<?php

namespace sysbar\Http\Controllers;

use Illuminate\Http\Request;
use sysbar\CartDetail;

class CartDetailController extends Controller
{
    public function store(Request $request)
    {
    	$cartDetail = new CartDetail();
    	$cartDetail->cart_id = auth()->user()->cart->id;
    	$cartDetail->product_id = $request->product_id;
    	$cartDetail->cantidad = $request->cantidad;
    	$cartDetail->save();

        $notificacion = "El producto se agregó correctamente al carrito";

    	return back()->with(compact('notificacion'));
    }

    public function destroy(Request $request)
    {
    	$cartDetail = CartDetail::find($request->cart_detail_id);

	    	if($cartDetail->cart_id == auth()->user()->cart->id)
	    	$cartDetail->delete();
        $notificacion = "El producto se ha removido del carrito correctamente";

    	return back()->with(compact('notificacion'));
    }
}
