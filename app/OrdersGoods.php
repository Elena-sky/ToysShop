<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdersGoods extends Model
{

    protected $table = 'OrdersGoods';
    protected $fillable = ['id', 'order_id', 'goods_id', 'count'];

    public function good()
    {
        $goods = $this->belongsTo('App\Goods', 'id');
        return $goods;
    }

}
