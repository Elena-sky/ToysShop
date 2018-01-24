<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdersDelivery extends Model
{
    protected $table = 'orders_delivery';
    protected $fillable = ['id', 'full_name', 'phone', 'city', 'payment_method', 'delivery_method', 'delivery_address'];


}
