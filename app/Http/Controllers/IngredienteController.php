<?php

namespace sysbar\Http\Controllers;

use sysbar\Ingrediente;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sysbar\Http\Requests\IngredienteFormRequest;
use DB;

class IngredienteController extends Controller
{
    public function __construct()
    {
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $empresas=DB::table('empresa')->get();
        $empresa_users=DB::table('empresa_users')->get();
        if($request)
        {
            $query=trim($request->get('searchText'));
            $ingredientes=DB::table('ingrediente as i')
            ->join('empresa as e','e.idempresa','=','i.idempresa')
            ->join('empresa_users as eu','eu.idempresa','=','e.idempresa')
            ->join('users as u','u.id','=','eu.idusers')
            ->select('i.idingrediente','i.nombre as ingrediente','e.idempresa as empresa','u.id as usuario')
            ->where('i.nombre','LIKE','%'.$query.'%')
            ->orderBy('i.idingrediente','desc')
            ->paginate(10);
            return view('ingredientes.index',["ingredientes"=>$ingredientes,"searchText"=>$query,"empresa_users"=>$empresa_users,"empresas"=>$empresas]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empresa_users=DB::table('empresa_users')->get();
        $empresas=DB::table('empresa')->get();
        return view("ingredientes.create",["empresas"=>$empresas,"empresa_users"=>$empresa_users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IngredienteFormRequest $request)
    {

        $ingrediente = $request->all();
        Ingrediente::create($ingrediente);
        $notificacion = "El nuevo registro de ingrediente se realizó con éxito!";
        return Redirect::to('ingredientes')->with(compact('notificacion'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \sysbar\Ingrediente  $ingrediente
     * @return \Illuminate\Http\Response
     */
    public function show(Ingrediente $ingrediente)
    {
        $empresa_users=DB::table('empresa_users')->get();
        $empresas=DB::table('empresa')->get();
        return view("ingredientes.show", compact('ingrediente'),["empresas"=>$empresas,"empresa_users"=>$empresa_users]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \sysbar\Ingrediente  $ingrediente
     * @return \Illuminate\Http\Response
     */
    public function edit(Ingrediente $ingrediente)
    {
        $empresa_users=DB::table('empresa_users')->get();
        $empresas=DB::table('empresa')->get();
        return view("ingredientes.edit", compact('ingrediente'),["empresas"=>$empresas,"empresa_users"=>$empresa_users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \sysbar\Ingrediente  $ingrediente
     * @return \Illuminate\Http\Response
     */
    public function update(IngredienteFormRequest $request, $id)
    {
        $ingrediente=Ingrediente::findOrFail($id);
        $ingrediente->nombre=$request->get('nombre');
        $ingrediente->idempresa=$request->get('idempresa');
        $ingrediente->update();
        $notificacion = "Los datos del ingrediente se actualizaron con éxito!";
        return Redirect::to('ingredientes')->with(compact('notificacion'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \sysbar\Ingrediente  $ingrediente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ingrediente $ingrediente)
    {
        $ingrediente->delete();
        $notificacion = "El ingrediente fue eliminado con éxito!";
        return back()->with(compact('notificacion'));
    }
}
