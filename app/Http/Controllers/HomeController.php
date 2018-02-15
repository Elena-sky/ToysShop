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
     * View user profile.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function profileUser()
    {
        $user = Auth::user();

        return view('user.profile', ['user' => $user]);
    }


    /**
     * Save changes to your profile.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function userActionSaveProfile()
    {
        $data = $_POST;
        $categoryData = User::find($data['id']);
        $categoryData->update($data);

        return \redirect(route('profile'));
    }

    /**
     * Review of old orders.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function userViewOldOrders()
    {
        $userId = Auth::user()->id;
        $orders = Orders::getUserOrders($userId);

        return view('user.oldOrders', ['orders' => $orders]);
    }

    /**
     * View old order by id.
     *
     * @param $orderId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function userViewOldOrdersById($orderId)
    {
        $order = Orders::find($orderId);
        $delivery = OrdersDelivery::find($order->delivery_id);

        return view('user.oldOrdersById', compact('order', 'delivery'));
    }

//    public function userCustomPasswordChange()
//    {
//        return view('auth.passwords.reset')->with(
//            ['token' => '', 'email' => Auth::user()->email]
//        );
//    }
}
