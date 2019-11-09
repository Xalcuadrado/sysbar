<?php

namespace sysbar\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CarritoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

 
    public function index()
    {
    	$empresas = DB::table('empresa')->get();
        return view('carrito',compact('empresas'));
    }
}
