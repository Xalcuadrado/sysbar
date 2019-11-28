<?php

namespace sysbar\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PedidosController extends Controller
{
        public function __construct()
    {
        
    }

    public function index(Request $request)
    {
        $empresas = DB::table('empresa')->get();

        $cartdetails = DB::table('cart_details as cde')
        ->join('producto as pro','pro.idproducto','=','cde.product_id')
        ->select('pro.nombre as producto','pro.imagen','pro.precio','cde.cantidad','cde.cart_id')
        ->get();

        $cart = DB::table('carts as car')
        ->join('cart_details as cde','cde.cart_id','=','car.id')
        ->join('producto as pro','pro.idproducto','=','cde.product_id')
        ->select(DB::raw('sum(cde.cantidad*pro.precio) as total'),'car.id')
        ->groupBy('car.id')
        ->get();


        if($request)
        {
            $query=trim($request->get('searchText'));
            $allorders=DB::table('carts as car')
            ->join('users as use','car.user_id','=','use.id')
            ->select('car.id as idcart','car.status','car.created_at','use.name as usuario','use.apellido','use.id as idusuario','use.t_documento','use.n_documento')
            ->where('car.id','LIKE','%'.$query.'%')
            ->orwhere('car.status','LIKE','%'.$query.'%')
            ->orwhere('car.created_at','LIKE','%'.$query.'%')
            ->orderBy('car.id','desc')
            ->paginate(10);
            return view('mispedidos.index',["allorders"=>$allorders,"cart"=>$cart,"searchText"=>$query,'empresas'=>$empresas,'cartdetails'=>$cartdetails]);
        } // listado
    }
}
