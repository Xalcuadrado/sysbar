<?php

namespace sysbar\Http\Controllers;

use Illuminate\Http\Request;
use sysbar\DetalleCart;

class DetallecartController extends Controller
{
    public function store(Request $request)
    {
    	$detallecart = new DetalleCart();
    	$detallecart->idcart = auth()->user()->idcart;
    	$detallecart->idproducto = $request->idproducto;
    	$detallecart->cantidad = $request->cantidad;
    	$detallecart->save();

    	return back();
    }
}
