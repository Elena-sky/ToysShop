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

    public function __construct()
    {
        $this->middleware(['isAuth']);
    }

    /**
     * Returns the first image.
     *
     * @param $id
     * @return bool
     */
    public static function getGoodMainImage(Goods $good)
    {
        return $good->getFirstImage();
    }


    /**
     * Order preview
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function viewCheckoutPage()
    {
        $cartItems = Cart::content();//﻿ получаем весь массив айдишников товаров текущего экземпляра корзины

        return view('checkout.checkoutData', ['items' => $cartItems]);
    }


    /**
     * Store a newly created order in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function viewCheckoutSave(Request $request)
    {
        $this->validate($request, [
            'full_name' => 'required|max:100',
            'phone' => 'required|integer',
            'city' => 'required',
            'delivery_method' => 'required',
            'payment_method' => 'required',
        ]);

        $userId = Auth::id(); //проверка на пользователя
        $fullName = $request->full_name;
        $phone = $request->phone;
        $city = $request->city;
        $deliveryAddress = (!empty($request->delivery_address)) ? $request->delivery_address : '';
        $comment = (!empty($request->comment)) ? $request->comment : '';

        if (!empty($userId)) {
            //Добавление в таблицу 'orders_delivery'
            $newDelivery = OrdersDelivery::create([
                'full_name' => $fullName,
                'phone' => $phone,
                'city' => $city,
                'payment_method' => $request->payment_method,
                'delivery_method' => $request->delivery_method,
                'delivery_address' => $deliveryAddress]);
            //Получение Id информации по доставке
            $lastDeliveryId = $newDelivery->id;

            //Создание заказа в таблице 'orders'
            $newOrders = Orders::create([
                'user_id' => $userId,
                'delivery_id' => $lastDeliveryId,
                'total' => Cart::subtotal(),
                'status' => $request->status,
                'user_coment' => $comment]);

            //Получение Id заказа
            $lastOrderId = $newOrders->id;

            //Получаем содержимое корзины
            $cartAll = Cart::content();

            foreach ($cartAll as $cart) {
                $data[] = ['order_id' => $lastOrderId, 'goods_id' => $cart->id, 'count' => $cart->qty];
            }

            OrdersGoods::insert($data);
        }

        Cart::destroy();

        return \redirect(route('viewOldOrders'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function viewCheckoutAddress()
    {
        return view('checkout.checkoutData');
    }

}