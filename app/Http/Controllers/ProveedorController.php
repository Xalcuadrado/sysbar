<?php

namespace sysbar\Http\Controllers;
use sysbar\Http\Requests;
use sysbar\Proveedor;
use Illuminate\Support\Facades\Redirect;
use sysbar\Http\Requests\ProveedorFormRequest;
use DB;
use sysbar\Empresa;
use Illuminate\Http\Request;

class ProveedorController extends Controller
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
            $proveedores=DB::table('proveedor as p')
            ->join('empresa as e','e.idempresa','=','p.idempresa')
            ->join('empresa_users as eu','eu.idempresa','=','e.idempresa')
            ->join('users as u','u.id','=','eu.idusers')
            ->select('p.idproveedor','p.nombre','p.t_documento','p.n_documento','p.telefono','p.direccion','p.email','e.idempresa as empresa','u.id as usuario')
            ->where('p.nombre','LIKE','%'.$query.'%')
            ->orwhere('p.n_documento','LIKE','%'.$query.'%')
            ->orderBy('p.idproveedor','desc')
            ->groupBy('p.idproveedor','p.nombre','p.t_documento','p.n_documento','p.telefono','p.direccion','p.email','e.idempresa','u.id')
            ->paginate(10);
            return view('proveedores.index',["proveedores"=>$proveedores,"searchText"=>$query,"empresa_users"=>$empresa_users,"empresas"=>$empresas]);
        }
    }
    public function create()
    {
        $empresa_users=DB::table('empresa_users')->get();
        $empresas=DB::table('empresa')->get();
        return view("proveedores.create",["empresas"=>$empresas,"empresa_users"=>$empresa_users]);
    }
    public function store(ProveedorFormRequest $request)
    {
        $proveedor=new Proveedor;
        $proveedor->nombre=$request->get('nombre');
        $proveedor->idempresa=$request->get('idempresa');
        $proveedor->direccion=$request->get('direccion');
        $proveedor->t_documento=$request->get('t_documento');
        $proveedor->n_documento=$request->get('n_documento');
        $proveedor->telefono=$request->get('telefono');
        $proveedor->email=$request->get('email');
        $proveedor->save();
        return Redirect::to('proveedores');
    }
    public function show($id)
    {
        $empresa_users=DB::table('empresa_users')->get();
        $empresas=DB::table('empresa')->get();
        return view("proveedores.show",["proveedor"=>Proveedor::findOrFail($id),"empresas"=>$empresas,"empresa_users"=>$empresa_users]);
    }
    public function edit($id)
    {
        $empresa_users=DB::table('empresa_users')->get();
        $empresas=DB::table('empresa')->get();
        return view("proveedores.edit",["proveedor"=>Proveedor::findOrFail($id),"empresas"=>$empresas,"empresa_users"=>$empresa_users]);
    }
    public function update(ProveedorFormRequest $request, $id)
    {
        $proveedor=Proveedor::findOrFail($id);
        $proveedor->nombre=$request->get('nombre');
        $proveedor->idempresa=$request->get('idempresa');
        $proveedor->direccion=$request->get('direccion');
        $proveedor->t_documento=$request->get('t_documento');
        $proveedor->n_documento=$request->get('n_documento');
        $proveedor->telefono=$request->get('telefono');
        $proveedor->email=$request->get('email');
        $proveedor->update();
        return Redirect::to('proveedores');
    }
    public function destroy($id)
    {
        $proveedor=Proveedor::findOrFail($id);
        $proveedor->delete();
        return Redirect::to('proveedores');
    }
}
