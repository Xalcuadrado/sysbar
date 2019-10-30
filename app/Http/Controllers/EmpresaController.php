<?php

namespace sysbar\Http\Controllers;


use sysbar\Http\Requests\EmpresaFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sysbar\Empresa;
use DB;

class EmpresaController extends Controller
{
	public function __construct()
    {
        
    }

    public function index(Request $request)
    {
    	if($request)
        {
            $query=trim($request->get('searchText'));
            $empresas=DB::table('empresa')->where('nombre','LIKE','%'.$query.'%')
            ->orderBy('idempresa','desc')
            ->paginate(10);
            return view('empresas.index',["empresas"=>$empresas,"searchText"=>$query]);
        } // listado
    }
    public function create()
    {
    	return view('empresas.create'); // formulario de registro
    }
    public function store(EmpresaFormRequest $request)
    {
    	//dd($request->all()); registrar la nueva empresa en la db
    	$empresa = $request->all();

        if($archivo=$request->file('file')){
            $nombre=$archivo->getClientOriginalName();
            $archivo->move('imagenes/empresas', $nombre);
            $empresa['logo']=$nombre;
        }

        Empresa::create($empresa);

        return Redirect::to('empresas');
    }

    public function show($id)
    {
    	$empresa = Empresa::find($id);
        return view("empresas.show")->with(compact('empresa'));
    }

    public function edit($id)
    {
    	$empresa = Empresa::find($id);
        return view("empresas.edit")->with(compact('empresa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \sysbar\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(EmpresaFormRequest $request, $id)
    {
        $empresa=Empresa::findOrFail($id);
        $empresa->nombre=$request->get('nombre');
        if (Input::hasFile('logo'))
            {
            $file=Input::file('logo');
            $file->move(public_path().'/imagenes/empresas/',$file->getClientOriginalName());
            $empresa->logo=$file->getClientOriginalName();
            }
        $empresa->update();
        return Redirect::to('empresas');
    }

        /**
     * Remove the specified resource from storage.
     *
     * @param  \sysbar\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empresa = Empresa::find($id);
        $empresa->delete();
        return Redirect::to('empresas');
    }
}
