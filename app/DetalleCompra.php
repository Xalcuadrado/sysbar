<?php

namespace sysbar;

use Illuminate\Database\Eloquent\Model;

class DetalleCompra extends Model
{
    protected $table='detalle_compra';

    protected $primaryKey='iddetalle_compra';

    protected $fillable =
    [
    	'idcompra',
    	'idproducto',
    	'cantidad',
    	'precio_compra'
    ];

    protected $guarded =[];
}
