<?php

namespace App\Http\Controllers;

use App\Orders;
use App\OrdersDelivery;
use App\OrdersGoods;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    //User view профиль
    public function profileUser()
    {
        $user = Auth::user();

        return view('user.profile', ['user' => $user]);
    }

    //User сохраняет изменения в профиле
    public function userActionSaveProfile()
    {
        $data = $_POST;
        $categoryData = User::find($data['id']);
        $categoryData->update($data);
        return \redirect(route('profile'));
    }

    public function userViewOldOrders()
    {
        $userId = Auth::user()->id;
        $orders = Orders::getUserOrders($userId);

        return view('user.oldOrders', ['orders' => $orders]);
    }

    public function userViewOldOrdersById($orderId)
    {
        $order = Orders::find($orderId);
        $delivery = OrdersDelivery::find($order->delivery_id);

        return view('user.oldOrdersById', ['order' => $order, 'delivery' => $delivery]);
    }

//    public function userCustomPasswordChange()
//    {
//        return view('auth.passwords.reset')->with(
//            ['token' => '', 'email' => Auth::user()->email]
//        );
//    }
}
