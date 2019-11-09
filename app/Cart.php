<?php

namespace sysbar;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table='carts';

    protected $primaryKey='id';

    protected $fillable = [
        'user_id','empresa_id','status'
    ];

    protected $guarded =[];

    public function details()
    {
        return $this->hasMany(CartDetail::class);
    }

    public function getTotalAttribute()
    {
    	$total = 0;
    	foreach ($this->details as $detail) {
    		$total += $detail->cantidad * $detail->producto->precio;
    	}

    	return $total;
    }
}
