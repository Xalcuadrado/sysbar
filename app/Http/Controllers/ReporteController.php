<?php

namespace sysbar\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ReporteController extends Controller
{
    public function reporteventa()
    {
        $ventas = DB::table('cart_details as cd')
        ->join('producto as pr','pr.idproducto','=','cd.product_id')
        ->select(DB::raw('sum(cd.cantidad) as cantidad'),'pr.nombre as producto')
        ->groupBy('cd.product_id','pr.nombre')
        ->get();

        $empresas = DB::table('empresa')->get();
        $productos = DB::table('producto')->paginate(8);

        $compras = DB::table('detalle_compra as com')
        ->join('producto as pro','pro.idproducto','=','com.idproducto')
        ->select(DB::raw('avg(com.precio_compra) as precio_compra'),'pro.nombre as producto','pro.precio as precio_venta')
        ->groupBy('com.precio_compra','pro.nombre','pro.precio')
        ->get();

    	return view('reportes.reporteventas',compact('ventas','productos','empresas','compras'));
    }
}
