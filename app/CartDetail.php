<?php

namespace sysbar;

use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
	public function producto()
	{
		return $this->belongsTo('sysbar\Producto','product_id');
	}
}
