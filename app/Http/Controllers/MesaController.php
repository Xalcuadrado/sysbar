<?php

namespace sysbar\Http\Controllers;

use sysbar\Mesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use sysbar\Http\Requests\MesaFormRequest;
use DB;
use sysbar\Empresa;

class MesaController extends Controller
{
    public function __construct()
    {

    }

    public function index(Request $request)
    {
        $empresas=DB::table('empresa')->get();
        $empresa_users=DB::table('empresa_users')->get();
        if($request)
        {
            $query=trim($request->get('searchText'));
            $mesas=DB::table('mesa as m')
            ->join('empresa as e','e.idempresa','=','m.idempresa')
            ->join('empresa_users as eu','eu.idempresa','=','e.idempresa')
            ->join('users as u','u.id','=','eu.idusers')
            ->select('m.idmesa','m.nombre','m.codigo','m.estado','e.idempresa as empresa','u.id as usuario')
            ->where('m.nombre','LIKE','%'.$query.'%')
            ->orderBy('m.idmesa','desc')
            ->groupBy('m.idmesa','m.nombre','m.codigo','m.estado','e.idempresa','u.id')
            ->paginate(10);
            return view('mesas.index',["mesas"=>$mesas,"searchText"=>$query,"empresa_users"=>$empresa_users,"empresas"=>$empresas]);
        }
    }
    public function create()
    {
        $empresa_users=DB::table('empresa_users')->get();
        $empresas=DB::table('empresa')->get();
        return view("mesas.create",["empresas"=>$empresas,"empresa_users"=>$empresa_users]);
    }
    public function store(MesaFormRequest $request)
    {
        $mesa=new Mesa;
        $mesa->nombre=$request->get('nombre');
        $mesa->idempresa=$request->get('idempresa');
        $mesa->codigo=$request->get('codigo');
        $mesa->estado='Inactivo';
        $mesa->save();
        return Redirect::to('mesas');
    }
    public function show($id)
    {
        $empresa_users=DB::table('empresa_users')->get();
        $empresas=DB::table('empresa')->get();
        return view("mesas.show",["mesa"=>Mesa::findOrFail($id),"empresas"=>$empresas,"empresa_users"=>$empresa_users]);
    }
    public function edit($id)
    {
        $empresa_users=DB::table('empresa_users')->get();
        $empresas=DB::table('empresa')->get();
        return view("mesas.edit",["mesa"=>Mesa::findOrFail($id),"empresas"=>$empresas,"empresa_users"=>$empresa_users]);
    }
    public function update(MesaFormRequest $request, $id)
    {
        $mesa=Mesa::findOrFail($id);
        $mesa->nombre=$request->get('nombre');
        $mesa->idempresa=$request->get('idempresa');
        $mesa->codigo=$request->get('codigo');
        $mesa->update();
        return Redirect::to('mesas');
    }
    public function destroy($id)
    {
        $mesa=Mesa::findOrFail($id);
        if($mesa->estado=='Activo')
        {
        $mesa->estado='Inactivo';
        }else
        {
        $mesa->estado='Activo';   
        }
        $mesa->update();
        return Redirect::to('mesas');
    }
}
