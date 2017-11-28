<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Goods;

use Gloudemans\Shoppingcart\Cart;
use Gloudemans\Shoppingcart\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function test(Request $request)
    {
        \Gloudemans\Shoppingcart\Facades\Cart::add('293ad', 'Product 1', 1, 9.99);
        dd(\Gloudemans\Shoppingcart\Facades\Cart::content());
        $cartItems = [];
        $sessionItems = $request->session()->get('cart.items');

        if (!empty($sessionItems)) {
            $cartItems = Goods::find($sessionItems);
            dd($cartItems->session()->all());
        }
    }

}
