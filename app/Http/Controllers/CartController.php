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


class CartController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['isAuth']);
    }


    /**
     * Display the shopping cart.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function cartView()
    {
        $cartItems = Cart::content();//﻿ получаем весь массив айдишников товаров текущего экземпляра корзины

        return view('basket', ['items' => $cartItems]);
    }


    /**
     * AJAX аdd an product from the card.
     *
     * @param $id
     */
    public function itemAdd(Request $request)
    {
        $data = $request;
        $goodsData = Cart::content();

        $userName = (Auth::check()) ? Auth::id() : false; //проверка на пользователя

        if (!empty($data)) {
            $id = $data['id'];  // id товара
            $rowId = self::searchInCart($id, $goodsData); //ищем этот товар в корзине

            if (is_null($rowId)) { //не находим, значить нужно добавить
                $good = Goods::find($id); //стягиваем информацию о товаре по id
                $cartAdd = Cart::add($id, $good->name, 1, $good->price); //добавляем в корзину 1 шт товара

                $result = ['price' => $good->price];

            } else {
                $item = Cart::get($rowId); //ищем товар в корзине для добавления колличества +1
                $count = $item->qty;// записываем в  $count текущее колличество
                Cart::update($rowId, ++$count); //добавляет +1 ед товара

                $result = ['qty' => $count, 'price' => $item->price];
            }
        }
    }


    /**
     * AJAX update an product from the card.
     *
     * @return array|bool
     */
    public function itemUpdate(Request $request)
    {
        $data = $request;
        $result = false;
        $goodsData = Cart::content();
        $userId = (Auth::check()) ? Auth::id() : false; //проверка на пользователя

        if (!empty($data)) {
            $id = $data['id'];  // id товара
            $rowId = self::searchInCart($id, $goodsData); //ищем этот товар в корзине

            if (!is_null($rowId)) { // если не пустой $rowId
                $qty = $data['count'];
                $prise = $data['price'];

                $goodPrice = $prise * $qty;

                $count = Cart::update($rowId, $qty);

                $result = ['qty' => $count, 'goodPrice' => $goodPrice];
            }

            return $result;
        }
    }


    /**
     * AJAX delete an product from the card.
     *
     * @param $id
     */
    public function itemDelete(Request $request)
    {
        $data = $request;
        $goodsData = Cart::content();

        if (!empty($data)) {
            $id = $data['id'];  // id товара
            $rowId = self::searchInCart($id, $goodsData); //ищем этот товар в корзине

            if (!is_null($rowId)) { // если не пустой $rowId

                $result = Cart::remove($rowId); // удаляем
            }
        }
    }


    /**
     * Search in cart
     *
     * @param $id
     * @param $cartContent
     * @return null
     */
    public static function searchInCart($id, $cartContent)
    {
        $rowId = null;
        foreach ($cartContent as $simple) {
            if ($id == $simple->id) $rowId = $simple->rowId;
        }
        return $rowId;
    }


    /**
     * Get good main image of products in shopping cart.
     *
     * @param $id
     * @return bool
     */
    public static function getGoodMainImage($id)
    {
        $good = Goods::find($id);
        if (!$good) return false;
        $good->getFirstImage();

        return $good->getFirstImage();
    }

}