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
        if (Auth::check()) {
            $userName = Auth::id();
            Cart::restore($userName . '-shoppingCart');
        }
        $cartItems = Cart::instance('shoppingCart')->content();  //﻿ получаем весь массив айдишников товаров текущего экземпляра корзины

        return view('cart', ['items' => $cartItems]);
    }

//    public function actionAdd($id)
//    {
//        $goodsData = Cart::content(); //﻿ получаем весь массив айдишников товаров текущего экземпляра корзины
//        $rowId = self::searchInCart($id, $goodsData); //получаем товар по id
//        $countQty = [];
//
//        if (is_null($rowId)) {
//            $good = Goods::find($id); //стягиваем информацию о товаре по id
//
//            $cartAdd = Cart::add($id, $good->name, 1, $good->price); //добавляем в корзину 1 шт товара
//            if (empty($goodsData)) Cart::store('test');
//            $countQty = ['qty' => $cartAdd->qty, 'price' => $good->price];
//
//        } else {
//            $item = Cart::get($rowId); //ищем товар в корзине для добавления колличества +1
//            $count = $item->qty;// записываем в  $count текущее колличество
//            Cart::update($rowId, ++$count); //добавляет +1 ед товара
//            $countQty = ['qty' => $count, 'price' => $item->price];
//
//        }
//
//        //ToDO Create  unify array for added at first time & and changed qty good in cart and return price and count to JS
//        return $countQty;// ['price' => , 'qty' => ]
//
//    }

//    public function actionDelete($id)
//    {
//        //﻿ получаем весь массив айдишников товаров текущего экземпляра корзины
//        $goodsData = Cart::content();
//
//        $rowId = self::searchInCart($id, $goodsData); // находим нужное id товара в корзине
//
//        if (!is_null($rowId)) {
//            Cart::remove($rowId);
//        } // удаляем
//
//        return ['id' => $rowId];//\redirect(route('cartView'));
//    }

    public function actionC()
    {
        $data = $_POST;
        $result = false;
        if (Auth::check()) {
            $userName = Auth::id();
            Cart::restore($userName . '-shoppingCart');
        }
        $goodsData = Cart::instance('shoppingCart')->content();//﻿ получаем весь массив айдишников товаров текущего экземпляра корзины

        $rowOld = $goodsData->search(function ($cartItem, $rowId) {
            return $cartItem->id === 1;
        });
        $countQty = [];

        if (!empty($data)) {
            $id = $data['id'];  // id товара
            $rowId = self::searchInCart($id, $goodsData); //ищем этот товар в корзине


            switch ($data['action']) {
                case 'add':   //добваление товара

                    if (is_null($rowId)) { //не находим, значить нужно добавить
                        $good = Goods::find($id); //стягиваем информацию о товаре по id

                        $cartAdd = Cart::instance('shoppingCart')->add($id, $good->name, 1, $good->price); //добавляем в корзину 1 шт товара
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
                        //  Cart::store($delete);
                    }
                    //    return ['id' => $rowId];
                    break;

                case 'update':

                    break;
            }
            if (Auth::check()) {
                $userName = Auth::id();
                Cart::store($userName . '-shoppingCart');
            }

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


    public static function getGoodMainImage($id)
    {
        $good = Goods::find($id);
        if (!$good) return false;
        $firstImage = $good->goodImg[0];
        return $firstImage->filename;
    }

    public function viewCheckoutPage()
    {

        return view('cartCheckout');
    }

    public function viewCheckoutSave()
    {

    }
}