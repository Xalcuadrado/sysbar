<?php

namespace sysbar;

use Illuminate\Database\Eloquent\Model;

class Ingrediente extends Model
{
    protected $table='ingrediente';

    protected $primaryKey='idingrediente';

    protected $fillable =
    [
    	'idempresa',
    	'nombre'
    ];

    protected $guarded =[];
}
