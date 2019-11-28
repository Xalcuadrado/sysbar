<?php

namespace sysbar;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $table='compra';

    protected $primaryKey='idcompra';

    protected $fillable =
    [
    	'idempresa',
    	'idproveedor',
    	't_comprobante',
    	'n_comprobante',
    	'impuesto',
    	'estado',

    ];

    protected $guarded =[];
}
