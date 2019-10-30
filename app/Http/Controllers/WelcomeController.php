<?php

namespace sysbar\Http\Controllers;

use Illuminate\Http\Request;
use sysbar\Empresa;

class WelcomeController extends Controller
{
    public function __construct()
    {
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	//vista de empresas para la vista welcome.blade.php
    	$empresas = Empresa::all();
    	return view('welcome')->with(compact('empresas'));
    }
}
