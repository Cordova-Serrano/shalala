<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductsByCar extends Model
{
    public function product()
    {
        return $this->belongsTo('App\product');
    }

    public function User()
    {
        return $this->belongsTo('App\User');
    }
}
