<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders';
    protected $fillable = ['id', 'user_id', 'delivery_id', 'total', 'status', 'comment'];

    public function goods()
    {
        return $this->hasManyThrough('App\Goods', 'App\OrdersGoods', 'order_id', 'id');
    }

    public static function getUserOrders($userId)
    {
        $userOrders = self::where('user_id', '=', $userId)->get();
        return $userOrders;
    }

    public static function getUserOrdersGoods($orderId)
    {
        $userOrderGoods = self::find($orderId);
        $orderGoods = $userOrderGoods->goods;
        return $orderGoods;
    }

}
