<?php

namespace sysbar\Http\Controllers;

use sysbar\Compra;
use sysbar\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sysbar\Http\Requests\CompraFormRequest;
use sysbar\DetalleCompra;
use sysbar\Empresa;
use DB;

use Response;
use Illuminate\Support\Collection;

class CompraController extends Controller
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
            $compras=DB::table('compra as c')
            ->join('proveedor as p','c.idproveedor','=','p.idproveedor')
            ->join('detalle_compra as dc','c.idcompra','=','dc.idcompra')
            ->join('empresa as e','e.idempresa','=','c.idempresa')
            ->join('empresa_users as eu','eu.idempresa','=','e.idempresa')
            ->join('users as u','u.id','=','eu.idusers')
            ->select('c.idcompra','p.nombre','c.t_comprobante','c.n_comprobante','c.impuesto','c.estado',DB::raw('sum(dc.cantidad*precio_compra) as total'),'e.idempresa as empresa','u.id as usuario')
            ->where('c.n_comprobante','LIKE','%'.$query.'%')
            ->orderBy('c.idcompra','desc')
            ->groupBy('c.idcompra','p.nombre','c.t_comprobante','c.n_comprobante','c.impuesto','c.estado','e.idempresa','u.id')
            ->paginate(10);
            return view('compras.index',["compras"=>$compras,"searchText"=>$query,"empresa_users"=>$empresa_users,"empresas"=>$empresas]);
        }
    }

    public function create()
    {
        $empresa_users=DB::table('empresa_users')->get();
        $empresas=DB::table('empresa')->get();
        $proveedores=DB::table('proveedor')->get();
        $productos=DB::table('producto as pr')
            ->join('empresa as e','e.idempresa','=','pr.idempresa')
            ->select(DB::raw('CONCAT(pr.codigo, " ",pr.nombre) AS producto'),'pr.idproducto','e.idempresa as empresa')
            ->where('pr.estado','=','Activo')
            ->get();
        return view("compras.create",["proveedores"=>$proveedores,"productos"=>$productos,"empresas"=>$empresas,"empresa_users"=>$empresa_users]);
    }

    public function store (CompraFormRequest $request)
    {
        try
        {
            DB::beginTransaction();

            $compra =new Compra;
            $compra->idempresa=$request->get('idempresa');
            $compra->idproveedor=$request->get('idproveedor');
            $compra->t_comprobante=$request->get('t_comprobante');
            $compra->n_comprobante=$request->get('n_comprobante');
            $compra->impuesto='0.19';
            $compra->estado='Realizado';
            $compra->save();

            $idproducto = $request->get('idproducto');
            $cantidad = $request->get('cantidad');
            $precio_compra = $request->get('precio_compra');

            $cont = 0;

            while($cont < count($idproducto))
            {
                $detalle = new DetalleCompra();
                $detalle->idcompra= $compra->idcompra;
                $detalle->idproducto= $idproducto[$cont];
                $detalle->cantidad= $cantidad[$cont];
                $detalle->precio_compra= $precio_compra[$cont];
                $detalle->save();
                $cont=$cont+1;
            }

            DB::commit();

        $notificacion = "El nuevo registro de compra se realizó con éxito!";
        }
        catch(\Exception $e)
        {
            DB::rollback();
        }

        return Redirect::to('compras')->with(compact('notificacion'));
    }

    public function show($id)
    {
        $compra=DB::table('compra as c')
            ->join('proveedor as pr','c.idproveedor','=','pr.idproveedor')
            ->join('empresa as em','c.idempresa','=','em.idempresa')
            ->join('detalle_compra as dc','c.idcompra','=','dc.idcompra')
            ->select('c.idcompra','pr.nombre','c.t_comprobante','c.n_comprobante','c.impuesto','c.estado',DB::raw('sum(dc.cantidad*precio_compra) as total'),'em.logo','em.nombre as empresa','c.created_at','c.updated_at')
            ->where('c.idcompra','=',$id)
            ->groupBy('c.idcompra','pr.nombre','c.t_comprobante','c.n_comprobante','c.impuesto','c.estado','em.nombre','em.logo','c.created_at','c.updated_at')
            ->first();

        $detalles=DB::table('detalle_compra as d')
            ->join('producto as p','d.idproducto','=','p.idproducto')
            ->select('p.nombre as producto','d.cantidad','d.precio_compra')
            ->where('d.idcompra','=',$id)
            ->get();

        return view("compras.show",["compra"=>$compra,"detalles"=>$detalles]);
    }

    public function destroy($id)
    {
        $compra=Compra::findOrFail($id);
        $compra->estado='Anulado';
        $compra->update();

        $notificacion = "El registro de compra fue anulada con éxito!";
        return Redirect::to('compras')->with(compact('notificacion'));
    }
}
