<?php

namespace sysbar;

use Illuminate\Database\Eloquent\Model;

class EmpresaUser extends Model
{
    protected $table='empresa_users';

    protected $primaryKey='idempresa_users';

    protected $fillable =
    [
    	'idusers',
    	'idempresa'
    ];

    protected $guarded =[];
}
