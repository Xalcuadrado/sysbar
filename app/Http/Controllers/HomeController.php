<?php

namespace sysbar\Http\Controllers;

use Illuminate\Http\Request;
use sysbar\Producto;
use sysbar\Empresa;
use DB;

class HomeController extends Controller
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
    public function index($id)
    {
        $empresa=DB::table('empresa')
        ->where('idempresa','=',$id)
        ->first();

        $productos=DB::table('producto as p')
        ->join('empresa as e','p.idempresa','=','e.idempresa')
        ->join('categoria as c','p.idcategoria','=','c.idcategoria')
        ->select('e.idempresa','e.nombre as empresa','e.logo','p.idproducto','p.nombre as producto','p.precio','p.stock','p.imagen','c.nombre as categoria','p.descripcion')
        ->where('e.idempresa','=',$id)
        ->paginate(9);

        $detalles=DB::table('detalle_ingrediente as dei')
        ->join('ingrediente as ing','ing.idingrediente','=','dei.idingrediente')
        ->select('ing.idingrediente','ing.nombre as ingrediente','dei.idproducto','dei.cantidad')
        ->get();

        return view('home')->with(compact('productos','empresa','detalles'));
    }

}
