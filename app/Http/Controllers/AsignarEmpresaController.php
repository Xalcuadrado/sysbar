<?php

namespace sysbar\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use sysbar\EmpresaUser;
use DB;

class AsignarEmpresaController extends Controller
{
    public function __construct()
    {
        
    }

    public function index(Request $request)
    {
    	$empresas = DB::table('empresa')->paginate(9);
    	$users = DB::table('users')->paginate(9);

    	if($request)
        {
            $query=trim($request->get('searchText'));
            $empuser=DB::table('empresa_users as eu')
            ->join('users as u','u.id','=','eu.idusers')
            ->join('empresa as e','e.idempresa','=','eu.idempresa')
            ->select('eu.idempresa_users','u.name as usuario','u.apellido','u.t_documento','u.n_documento','u.telefono','u.email','e.nombre as empresa')
            ->where('eu.idusers','LIKE','%'.$query.'%')
            ->orwhere('eu.idempresa','LIKE','%'.$query.'%')
            ->orderBy('eu.idempresa_users','desc')
            ->paginate(10);
            return view('asignar.index',["empuser"=>$empuser,"users"=>$users,"empresas"=>$empresas,"searchText"=>$query]);
        } // listado
    }

    public function store(Request $request)
    {
    	$empresauser = $request->all();
        EmpresaUser::create($empresauser);

        return back();
    }
}
