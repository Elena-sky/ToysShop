<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Orders extends Model
{
    protected $table = 'orders';
    protected $fillable = ['id', 'user_id', 'delivery_id', 'total', 'status', 'user_coment', 'is_new', 'created_at', 'updated_at'];

    public function goods()
    {
        return $this->hasManyThrough('App\Goods', 'App\OrdersGoods', 'order_id', 'id');
    }

    public function orderGoods()
    {
        return $this->hasMany('App\OrdersGoods', 'order_id');
    }

    public static function getUserOrders($userId)
    {
        $userOrders = self::where('user_id', '=', $userId)->get();
        return $userOrders;
    }

    public static function getUserOrdersGoods($orderId)
    {
        $userOrderGoods = self::find($orderId);
        $orderGoods = $userOrderGoods->goods;//todo replace
        return $orderGoods;
    }

    public static function getOrderGood($orderId, $goodId)
    {
        $good = DB::select
        ('select * from OrdersGoods where order_id = :orderId and goods_id = :goodId', ['orderId' => $orderId, 'goodId' => $goodId]);
        $result = (empty($good)) ? null : array_shift($good);
        return $result;
    }

}
