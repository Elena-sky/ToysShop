<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdersGoods extends Model
{

    protected $table = 'OrdersGoods';
    protected $fillable = ['id', 'order_id', 'goods_id', 'count'];

    /*public function orderGood () {
        return $this
    }*/
}
