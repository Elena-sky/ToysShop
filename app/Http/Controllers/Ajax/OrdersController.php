<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\OrdersGoods;


class OrdersController extends Controller
{
    //View редактировать количество товаров в заказе
    public function adminActionOrderProduct()
    {
        $data = Input::get();
        $orderGoods = OrdersGoods::find($data['ogid']);

        if ($data['action'] == 'delete' && !empty($orderGoods)) {
            $orderGoods->delete();
        }

        if ($data['action'] == 'update' && !empty($orderGoods)) {
            $orderGoods->update(['count' => $data['oldVal']]);
        }
    }
}
