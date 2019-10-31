<?php

namespace sysbar;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table='producto';

    protected $primaryKey='idproducto';

    protected $fillable =
    [
    	'idcategoria',
        'idempresa',
    	'codigo',
    	'nombre',
        'precio',
    	'stock',
    	'imagen',
    	'estado',
    	'descripcion'
    ];

    protected $guarded =[];
}
