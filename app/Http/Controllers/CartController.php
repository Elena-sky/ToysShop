<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Goods;
use Illuminate\Routing\Route;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;


class CartController extends Controller
{
    public function cartView(Request $request)
    {
        $cartItems = [];
        $sessionItems = $request->session()->get('cart.items');

        if (!empty($sessionItems)) {
            //$cartItems = Goods::find($sessionItems);
            array_push($cartItems, Goods::find($sessionItems));
        }

        return view('cart', ['items' => $cartItems]);
    }

    public static function getProducts()
    {

    }

    public function actionAdd($id, Request $request)
    {
        $request->session()->push('cart.items', $id);
        return \redirect(route('cartView'));
    }

    public function actionDelete($id, Request $request)
    {
        //﻿ стягиваешь просто весь массив айдишников товаров
        $sessionItems = $request->session()->get('cart.items');

        // поиск данного $id в массиве $sessionItems и возвращает ключ
        $keyItem = array_search($id, $sessionItems);

        //unset
        $request->session()->forget($keyItem);


        //Записываем массив товаров с удаленным элементом в сессию

        $request->session()->put('key', 'value');


//        //Получаем масив с идентификаторами и количеством товаров в корзине
//        if ($request->session()->has('cart.items')) {
//            //Удаляем из массива элемент с указанным id
//           $request->session()->pull('cart.items'.$id);
//          return $request;
//        }
//
//        //Записываем массив товаров с удаленным элементом в сессию
//        $request->session()->put('cart.items', $id);
        return \redirect(route('cartView'));

    }

}

