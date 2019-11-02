<?php

namespace sysbar;

use Caffeinated\Shinobi\Traits\ShinobiTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, ShinobiTrait;

    public function roles()
    {
        return $this->belongsToMany('Caffeinated\Shinobi\Models\Role');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','apellido', 'email', 'password','t_documento','n_documento','telefono','foto'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    //cart_id

    public function getCartAttribute()
    {
       $cart = $this->carts()->where('status','activo')->first();
        if ($cart)
            return $cart;
        //else
        $cart = new Cart();
        $cart->status = 'activo';
        $cart->user_id = $this->id;
        $cart->save();

        return $cart;
    }
}
