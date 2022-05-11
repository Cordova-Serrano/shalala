<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductsByPedido extends Model
{
    public function Product()
    {
        return $this->belongsTo('App\product');
    }

    public function User()
    {
        return $this->belongsTo('App\User');
    }

    public function Pedido()
    {
        return $this->belongsTo('App\Pedidos');
    }
}
