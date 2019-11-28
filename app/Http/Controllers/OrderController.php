<?php

namespace sysbar\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use sysbar\Cart;
use DB;

class OrderController extends Controller
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
            $orders=DB::table('carts as car')
            ->join('users as use','car.user_id','=','use.id')
            ->select('car.id as idcart','car.status','use.name as usuario','use.apellido','use.id as idusuario','use.t_documento','use.n_documento')
            ->where('use.n_documento','LIKE','%'.$query.'%')
            ->where('car.status','=','pendiente')
            ->orderBy('car.id','desc')
            ->paginate(10);
            return view('orders.index',["orders"=>$orders,"cart"=>$cart,"searchText"=>$query,'empresas'=>$empresas,'cartdetails'=>$cartdetails]);
        } // listado
    }

    public function allindex(Request $request)
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
            ->select('car.id as idcart','car.status','use.name as usuario','use.apellido','use.id as idusuario','use.t_documento','use.n_documento')
            ->where('use.n_documento','LIKE','%'.$query.'%')
            ->orderBy('car.id','desc')
            ->paginate(10);
            return view('allorders.index',["allorders"=>$allorders,"cart"=>$cart,"searchText"=>$query,'empresas'=>$empresas,'cartdetails'=>$cartdetails]);
        } // listado
    }

    public function cancelindex(Request $request)
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
            $cancelorders=DB::table('carts as car')
            ->join('users as use','car.user_id','=','use.id')
            ->select('car.id as idcart','car.status','use.name as usuario','use.apellido','use.id as idusuario','use.t_documento','use.n_documento')
            ->where('use.n_documento','LIKE','%'.$query.'%')
            ->where('car.status','=','cancelado')
            ->orderBy('car.id','desc')
            ->paginate(10);
            return view('cancelorders.index',["cancelorders"=>$cancelorders,"cart"=>$cart,"searchText"=>$query,'empresas'=>$empresas,'cartdetails'=>$cartdetails]);
        } // listado
    }

    public function aceptorders(Request $request)
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
            $aceptorders=DB::table('carts as car')
            ->join('users as use','car.user_id','=','use.id')
            ->select('car.id as idcart','car.status','use.name as usuario','use.apellido','use.id as idusuario','use.t_documento','use.n_documento')
            ->where('use.n_documento','LIKE','%'.$query.'%')
            ->where('car.status','=','aceptado')
            ->orderBy('car.id','desc')
            ->paginate(10);
            return view('aceptorders.index',["aceptorders"=>$aceptorders,"cart"=>$cart,"searchText"=>$query,'empresas'=>$empresas,'cartdetails'=>$cartdetails]);
        } // listado
    }

	public function show($id)
	{
		$order =  Cart::find($id);

		$cartdetail = DB::table('cart_details')
		->where('cart_id','=',$id)
		->first();
		return view('orders.show',compact('order','cartdetail'));
	}

    public function update(Request $request, $id)
    {
    	$order =  Cart::find($id);
        $order->status=$request->get('status');
        $order->update();
        return back();
    }

    public function destroy()
    {
    	$order =  Cart::find($id);
        $order->delete();
        return Redirect::to('orders');
    }
}
