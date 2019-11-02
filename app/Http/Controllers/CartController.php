<?php

namespace sysbar\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function update()
    {
    	$cart = auth()->user()->cart;
    	$cart->status = "pendiente";
    	$cart->save(); //update

    	$notificacion = "Tu pedido se ha registrado correctamente, verificaremos tu presencia en el local";
    	return back()->with(compact('notificacion'));
    }
}
