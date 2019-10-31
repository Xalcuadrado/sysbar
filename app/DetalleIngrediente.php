<?php

namespace sysbar;

use Illuminate\Database\Eloquent\Model;

class DetalleIngrediente extends Model
{
    protected $table='detalle_ingrediente';

    protected $primaryKey='iddetalle_ingrediente';

    protected $fillable =
    [
    	'idproducto',
    	'idingrediente',
    	'cantidad'
    ];

    protected $guarded =[];
}
