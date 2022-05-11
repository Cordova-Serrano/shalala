<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    //Una categoria puede tener varios productos
    public function products()
    {
        return $this->hasMany('App\product');
    }
}
