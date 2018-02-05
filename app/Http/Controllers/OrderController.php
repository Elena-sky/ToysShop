<?php

namespace App\Http\Controllers;

use App\Orders;
use App\OrdersDelivery;
use App\OrdersGoods;
use Gloudemans\Shoppingcart\CartItem;
use Illuminate\Http\Request;
use App\Goods;
use Illuminate\Routing\Route;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use \Gloudemans\Shoppingcart\Facades\Cart;


class OrderController extends Controller
{

    public static function getGoodMainImage($id)
    {
        $good = Goods::find($id);
        if (!$good) return false;
        $good->getFirstImage();


        return $good->getFirstImage();
    }

    public function viewCheckoutPage()
    {
        $user = Auth::user();

        $cartItems = Cart::content();//﻿ получаем весь массив айдишников товаров текущего экземпляра корзины
        return view('checkout.checkoutData', ['user' => $user, 'items' => $cartItems]);
    }

    public function viewCheckoutSave(Request $request)
    {
        $userId = Auth::id(); //проверка на пользователя
        $fullName = $request->full_name;
        $phone = $request->phone;
        $city = $request->city;
        $deliveryAddress = $request->delivery_address;

        if (!empty($fullName) && !empty($phone) && !empty($city) && !empty($deliveryAddress) && !empty($userId)) {
            //Добавление в таблицу 'orders_delivery'
            $newDelivery = OrdersDelivery::create(['full_name' => $fullName, 'phone' => $phone, 'city' => $city, 'payment_method' => $request->payment_method, 'delivery_method' => $request->delivery_method, 'delivery_address' => $deliveryAddress]);

            //Получение Id информации по доставке
            $lastDeliveryId = $newDelivery->id;

            //Создание заказа в таблице 'orders'
            $newOrders = Orders::create(['user_id' => $userId, 'delivery_id' => $lastDeliveryId, 'total' => Cart::subtotal(),
                'status' => $request->status, 'user_coment' => $request->comment]);

            //Получение Id заказа
            $lastOrderId = $newOrders->id;

            //Получаем содержимое корзины
            $cartAll = Cart::content();

            foreach ($cartAll as $cart) {
                $goodId = $cart->id;
                $goodQty = $cart->qty;

                //Заполняем таблицу 'OrdersGoods'
                $add = OrdersGoods::create(['order_id' => $lastOrderId, 'goods_id' => $goodId, 'count' => $goodQty]);
            }

        }

        return \redirect(route('viewOldOrders'));

    }

    public function viewCheckoutAddress()
    {
        $user = Auth::user();

        return view('checkout.checkoutData', ['user' => $user]);
    }

}