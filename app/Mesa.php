<?php

namespace sysbar;

use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{
    protected $table='mesa';

    protected $primaryKey='idmesa';

    protected $fillable =
    [
    	'idempresa',
    	'codigo',
    	'nombre',
    	'estado'
    ];

    protected $guarded =[];
}
