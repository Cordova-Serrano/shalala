<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //Un carrito puede tener varios productos
    public function product()
    {
        return $this->hasMany('App\product');
    }
}
