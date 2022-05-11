<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedidos extends Model
{
    //Un pedido pertenece a un usuairo
    public function User()
    {
        return $this->belongsTo('App\User');
    }

    //Un pedido pertenece a un carrito
    public function Cart()
    {
        return $this->belongsTo('App\ProductsByCar');
    }
}
