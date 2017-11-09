<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders';

    /*public function goods () {
        $this->hasMany('App\Goods' );//TODO peredelatj
    }*/

    public function goods()
    {
        return $this->hasManyThrough('App\Goods', 'App\OrdersGoods');
    }
}
