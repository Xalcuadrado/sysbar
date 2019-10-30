<?php

namespace sysbar\Http\Controllers;

use sysbar\Http\Requests\CategoriaFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sysbar\Categoria;
use DB;

class CategoriaController extends Controller
{
    public function __construct()
    {
        
    }

    public function index(Request $request)
    {
    	if($request)
        {
            $query=trim($request->get('searchText'));
            $categorias=DB::table('categoria')->where('nombre','LIKE','%'.$query.'%')
            ->orderBy('idcategoria','desc')
            ->paginate(10);
            return view('categorias.index',["categorias"=>$categorias,"searchText"=>$query]);
        } // listado
    }
    public function create()
    {
    	return view('categorias.create'); // formulario de registro
    }
    public function store(CategoriaFormRequest $request)
    {
    	//dd($request->all()); registrar la nueva categoria en la db
    	$categoria = $request->all();
        Categoria::create($categoria);

        return Redirect::to('categorias');
    }

    public function show($id)
    {
    	$categoria = Categoria::find($id);
        return view("categorias.show")->with(compact('categoria'));
    }

    public function edit($id)
    {
    	$categoria = Categoria::find($id);
        return view("categorias.edit")->with(compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \sysbar\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(CategoriaFormRequest $request, $id)
    {
        $categoria=Categoria::findOrFail($id);
        $categoria->nombre=$request->get('nombre');
        $categoria->descripcion=$request->get('descripcion');
        $categoria->update();
        return Redirect::to('categorias');
    }

        /**
     * Remove the specified resource from storage.
     *
     * @param  \sysbar\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria = Categoria::find($id);
        $categoria->delete();
        return Redirect::to('categorias');
    }
}
