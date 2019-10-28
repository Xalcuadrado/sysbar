<?php

namespace sysbar;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table='empresa';

    protected $primaryKey='idempresa';

    protected $fillable =
    [
    	'nombre',
    	'logo'
    ];

    protected $guarded =[];
}
