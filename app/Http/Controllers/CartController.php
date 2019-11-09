<?php

namespace sysbar\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function update(Request $request)
    {
    	$cart = auth()->user()->cart;
    	$cart->empresa_id = $request->empresa_id;
    	$cart->status = "pendiente";
    	$cart->save(); //update

    	$notificacion = "Tu pedido se ha registrado correctamente, verificaremos tu presencia en el local";
    	return back()->with(compact('notificacion'));
    }
}
