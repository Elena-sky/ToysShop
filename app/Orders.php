<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders';
    protected $fillable = ['id', 'user_id', 'delivery_id', 'total', 'status', 'comment'];

    public function goods()
    {
        return $this->hasManyThrough('App\Goods', 'App\OrdersGoods');
    }
}
