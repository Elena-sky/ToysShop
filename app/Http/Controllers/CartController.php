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
     * Display the shopping cart.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function cartView(Request $request)
    {
        $userName = (Auth::check()) ? Auth::id() : 'anonim'; //проверка на пользователя

        $cartItems = Cart::content();//﻿ получаем весь массив айдишников товаров текущего экземпляра корзины

        return view('basket', ['items' => $cartItems]);
    }


    /**
     * Return shopping cart.
     *
     * @param string $returnable
     * @return mixed
     */
    public static function kostilMeth($returnable = 'content')
    {
        $userName = (Auth::check()) ? Auth::id() : 'anonim'; //проверка на пользователя
        Cart::restore($userName . '-shoppingCart'); // Востанавливем корзину по уникальному ID
        $total = Cart::total();
        $count = Cart::count();
        $content = Cart::content();
        return $$returnable;
    }

    /**
     * AJAX actions add, update and remove product from the card.
     *
     * @return array|bool
     */
    public function actionC()
    {
        $data = $_POST;
        $result = false;
        $userName = (Auth::check()) ? Auth::id() : 'anonim'; //проверка на пользователя
        $goodsData = self::kostilMeth();

        $cartItem = Cart::content();

        if (!empty($data)) {
            $id = $data['id'];  // id товара
            $rowId = self::searchInCart($id, $goodsData); //ищем этот товар в корзине

            switch ($data['action']) {
                case 'add':   //добваление товара

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

                    break;

                case 'delete':

                    if (!is_null($rowId)) { // если не пустой $rowId

                        $result = Cart::remove($rowId); // удаляем
                    }

                    break;

                case 'update':
                    if (!is_null($rowId)) { // если не пустой $rowId
                        $qty = $data['count'];
                        $prise = $data['price'];

                        $goodPrice = $prise * $qty;

                        $count = Cart::update($rowId, $qty);

                        $result = ['qty' => $count, 'goodPrice' => $goodPrice];

                    }


                    break;
            }
//            Cart::store($userName . '-shoppingCart'); //сохраняем- POST 500 уже сохранен

            return $result;
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