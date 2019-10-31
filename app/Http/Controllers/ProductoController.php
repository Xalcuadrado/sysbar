<?php

namespace sysbar\Http\Controllers;

use sysbar\Producto;
use sysbar\Empresa;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sysbar\Http\Requests\ProductoFormRequest;
use sysbar\DetalleIngrediente;
use DB;
use Response;
use Illuminate\Support\Collection;

class ProductoController extends Controller
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
            $productos=DB::table('producto as p')
            ->join('categoria as c','p.idcategoria','=','c.idcategoria')
            ->join('empresa as e','p.idempresa','=','e.idempresa')
            ->join('empresa_users as eu','eu.idempresa','=','e.idempresa')
            ->join('users as u','u.id','=','eu.idusers')
            ->select('p.idproducto','p.codigo','p.nombre as producto','c.nombre as categoria','p.precio','p.stock','p.imagen','p.estado','p.descripcion','e.idempresa as empresa','u.id as usuario')
            ->where('p.nombre','LIKE','%'.$query.'%')
            ->orderBy('p.idproducto','desc')
            ->groupBy('p.idproducto','p.codigo','p.nombre','c.nombre','p.precio','p.stock','p.imagen','p.estado','p.descripcion','e.idempresa','u.id')
            ->paginate(10);
            return view('productos.index',["productos"=>$productos,"searchText"=>$query,"empresa_users"=>$empresa_users,"empresas"=>$empresas]);
        }
    }

    public function create()
    {
        $empresa_users=DB::table('empresa_users')->get();
        $empresas=DB::table('empresa')->get();
        $categorias=DB::table('categoria')->get();
        $ingredientes=DB::table('ingrediente as i')
            ->select('i.nombre','i.idingrediente','i.idempresa')
            ->get();
        return view("productos.create",["categorias"=>$categorias,"empresa_users"=>$empresa_users,"empresas"=>$empresas,"ingredientes"=>$ingredientes]);
    }

    public function store (ProductoFormRequest $request)
    {
            $producto =new Producto;
            $producto->idempresa=$request->get('idempresa');
            $producto->idcategoria=$request->get('idcategoria');
            $producto->codigo=$request->get('codigo');
            $producto->nombre=$request->get('nombre');
            $producto->precio=$request->get('precio');
            $producto->stock=$request->get('stock');
            $producto->descripcion=$request->get('descripcion');
            if (Input::hasFile('imagen'))
            {
            $file=Input::file('imagen');
            $file->move(public_path().'/imagenes/productos/',$file->getClientOriginalName());
            $producto->imagen=$file->getClientOriginalName();
            }
            $producto->estado='Activo';
            $producto->save();

            $idingrediente = $request->get('idingrediente');
            $cantidad = $request->get('cantidad');

            $cont = 0;

            while($cont < count($idingrediente))
            {
                $detalle = new DetalleIngrediente();
                $detalle->idproducto= $producto->idproducto;
                $detalle->idingrediente= $idingrediente[$cont];
                $detalle->cantidad= $cantidad[$cont];
                $detalle->save();
                $cont=$cont+1;
            }

        return Redirect::to('productos');
    }

    public function show($id)
    {
        $empresa_users=DB::table('empresa_users')->get();
        $empresas=DB::table('empresa')->get();
        $categorias=DB::table('categoria')->get();
        $ingredientes=DB::table('ingrediente as i')
            ->select('i.nombre','i.idingrediente','i.idempresa')
            ->get();

        $producto=DB::table('producto as p')
            ->join('categoria as c','p.idcategoria','=','c.idcategoria')
            ->join('detalle_ingrediente as di','p.idproducto','=','di.idproducto')
            ->join('empresa as e','p.idempresa','=','e.idempresa')
            ->select('p.idproducto','p.nombre','c.nombre as categoria','p.precio','p.stock','p.imagen','p.codigo','p.estado','p.descripcion','e.nombre as empresa','p.created_at','p.updated_at')
            ->where('p.idproducto','=',$id)
            ->first();

        $detalles=DB::table('detalle_ingrediente as d')
            ->join('ingrediente as i','d.idingrediente','=','i.idingrediente')
            ->select('i.nombre as ingrediente','d.cantidad')
            ->where('d.idproducto','=',$id)
            ->get();

        return view("productos.show",["producto"=>$producto,"detalles"=>$detalles,"empresa_users"=>$empresa_users,"empresas"=>$empresas,"categorias"=>$categorias,"ingredientes"=>$ingredientes]);
    }

        public function edit($id)
    {
        $empresa_users=DB::table('empresa_users')->get();
        $empresas=DB::table('empresa')->get();
        $categorias=DB::table('categoria')->get();
        $ingredientes=DB::table('ingrediente as i')
            ->select('i.nombre','i.idingrediente','i.idempresa')
            ->get();

        $producto=DB::table('producto as p')
            ->join('categoria as c','p.idcategoria','=','c.idcategoria')
            ->join('detalle_ingrediente as di','p.idproducto','=','di.idproducto')
            ->join('empresa as e','p.idempresa','=','e.idempresa')
            ->select('p.idproducto','p.nombre','c.nombre as categoria','p.precio','p.stock','p.imagen','p.codigo','p.estado','p.descripcion','e.nombre as empresa','p.idcategoria')
            ->where('p.idproducto','=',$id)
            ->first();

        return view("productos.edit",["producto"=>$producto,"empresa_users"=>$empresa_users,"empresas"=>$empresas,"categorias"=>$categorias,"ingredientes"=>$ingredientes]);
    }

    public function update (ProductoFormRequest $request, $id)
    {
            $producto = Producto::findOrFail($id);
            $producto->idempresa=$request->get('idempresa');
            $producto->idcategoria=$request->get('idcategoria');
            $producto->codigo=$request->get('codigo');
            $producto->nombre=$request->get('nombre');
            $producto->precio=$request->get('precio');
            $producto->stock=$request->get('stock');
            $producto->descripcion=$request->get('descripcion');
            if (Input::hasFile('imagen'))
            {
            $file=Input::file('imagen');
            $file->move(public_path().'/imagenes/productos/',$file->getClientOriginalName());
            $producto->imagen=$file->getClientOriginalName();
            }
            $producto->estado='Activo';
            $producto->update();

        return Redirect::to('productos');
    }

    public function destroy($id)
    {
        $producto=Producto::findOrFail($id);
        if($producto->estado=='Activo')
        {
        $producto->estado='Inactivo';
        }else
        {
        $producto->estado='Activo';   
        }
        $producto->update();
        return Redirect::to('productos');
    }
}
