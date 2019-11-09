<?php

namespace sysbar;

use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
	protected $table='cart_details';

    protected $primaryKey='id';

    protected $fillable =
    [
    	'cantidad',
    	'product_id',
    	'cart_id'
    ];

    protected $guarded =[];

	public function producto()
	{
		return $this->belongsTo('sysbar\Producto','product_id');
	}
}
