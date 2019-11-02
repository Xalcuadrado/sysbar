<?php

namespace sysbar\Http\Controllers;

use Illuminate\Http\Request;
use sysbar\Producto;
use sysbar\Empresa;
use DB;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    	$detalles=DB::table('detalle_ingrediente as dei')
        ->join('ingrediente as ing','ing.idingrediente','=','dei.idingrediente')
        ->select('ing.idingrediente','ing.nombre as ingrediente','dei.idproducto','dei.cantidad')
        ->get();

    	$producto=DB::table('producto as p')
    	->join('empresa as e','p.idempresa','=','e.idempresa')
    	->join('categoria as c','p.idcategoria','=','c.idcategoria')
    	->select('e.idempresa','e.nombre as empresa','e.logo','p.idproducto','p.codigo','p.nombre as producto','p.precio','p.stock','p.imagen','p.descripcion','p.estado','c.nombre as categoria')
    	->where('p.idproducto','=',$id)
        ->groupBy('e.idempresa','e.nombre','e.logo','p.idproducto','p.codigo','p.nombre','p.precio','p.stock','p.imagen','p.descripcion','p.estado','c.nombre')
    	->first();

        return view('products.show')->with(compact('producto','detalles'));
    }
}
