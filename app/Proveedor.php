<?php

namespace sysbar;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table='proveedor';

    protected $primaryKey='idproveedor';

    protected $fillable =
    [
    	'idempresa',
    	'nombre',
    	'direccion',
    	't_documento',
    	'n_documento',
    	'telefono',
    	'email'
    ];

    protected $guarded =[];
}
