<?php

namespace App\Http\Controllers;

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
    public function cartView(Request $request)
    {
        if (Auth::check()) { //проверка на пользователя
            $userName = Auth::id(); //
        } else {
            $userName = 'pipka';
        }

        $cartItems = Cart::content();  //﻿ получаем весь массив айдишников товаров текущего экземпляра корзины
        if (empty($cartItems)) {
            Cart::restore($userName . '-shoppingCart');
        }
        return view('cart', ['items' => $cartItems]);
    }


    public static function kostilMeth($returnable = 'content')
    {
        if (Auth::check()) { //проверка на пользователя
            $userName = Auth::id(); //
        } else {
            $userName = 'pipka';
        }
        Cart::restore($userName . '-shoppingCart'); // Востанавливем корзину по уникальному ID
        $total = Cart::total();
        $count = Cart::count();
        $content = Cart::content();
        return $$returnable;
    }

    public function actionC()
    {
        $data = $_POST;
        $result = false;
        /*if (Auth::check()) { //проверка на пользователя
            $userName = Auth::id(); //
        } else {
            $userName = 'pipka';
        }
        Cart::restore($userName . '-shoppingCart'); // Востанавливем корзину по уникальному ID
        $goodsData = Cart::
        content();//﻿ получаем весь массив айдишников товаров текущего экземпляра корзины*/
        $goodsData = self::kostilMeth();
        $rowOld = $goodsData->search(function ($cartItem, $rowId) {
            return $cartItem->id === 1;
        });
        $countQty = [];

        if (!empty($data)) {
            $id = $data['id'];  // id товара
            $rowId = self::searchInCart($id, $goodsData); //ищем этот товар в корзине
            //Cart::restore($userName . '-shoppingCart'); // Востанавливем корзину по уникальному ID

            switch ($data['action']) {
                case 'add':   //добваление товара

                    if (is_null($rowId)) { //не находим, значить нужно добавить
                        $good = Goods::find($id); //стягиваем информацию о товаре по id

                        $cartAdd = Cart::/*instance('shoppingCart')->*/
                        add($id, $good->name, 1, $good->price); //добавляем в корзину 1 шт товара
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

                    break;
            }
            Cart::store($userName . '-shoppingCart'); //сохраняем

            return $result;
        }


    }

    public static function searchInCart($id, $cartContent)
    {
        $rowId = null;
        foreach ($cartContent as $simple) {
            if ($id == $simple->id) $rowId = $simple->rowId;

            return $rowId;

        }
    }

}