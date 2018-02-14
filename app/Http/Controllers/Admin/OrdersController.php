<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\OrdersDelivery;
use App\OrdersGoods;
use App\Orders;
use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;


class OrdersController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'clearance'])->except('index', 'show');
    }


    /**
     * Display all list of orders.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function adminViewAllOrders()
    {
        $orders = (empty($_GET['isnew'])) ? Orders::all() : Orders::where('is_new', $_GET['isnew'])->get();

        return view('admin.orders.ordersView', compact('orders'));
    }


    /**
     * Display one order.
     *
     * @param $orderId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function adminViewOneOrder($orderId)
    {
        $order = Orders::find($orderId);
        $userName = User::getNameById($order->user_id);
        $delivery = OrdersDelivery::find($order->delivery_id);

        return view('admin.orders.oneOrder', compact('order', 'delivery', 'userName'));
    }


    /**
     *Show the form for editing the delivery.
     *
     * @param $orderId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function adminViewDeliveryUpdate($orderId)
    {
        $order = Orders::find($orderId);
        $delivery = OrdersDelivery::find($order->delivery_id);

        return view('admin.orders.deliveryUpdate', compact('delivery', 'orderId'));
    }


    /**
     * Update of delivery
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function adminActionDeliverySave()
    {
        $data = $_POST;
        $orderid = $data['orderId'];
        $deliveryData = OrdersDelivery::find($data['id']);
        $deliveryData->update($data);

        return \redirect(route('viewOneOrder', compact('orderid')));
    }


    /**
     * Show page order for editing.
     *
     * @param $orderId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function adminViewOrderUpdate($orderId)
    {
        $order = Orders::find($orderId);

        return view('admin.orders.orderUpdate', compact('order'));

    }


    /**
     * Update order page.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function adminActionOrderSave()
    {
        $data = $_POST;
        $orderid = $data['id'];
        $orderData = Orders::find($orderid);
        $orderData->update($data);

        return \redirect(route('viewOneOrder', compact('orderid')));
    }


    /**
     * Remove order.
     *
     * @param $orderId
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function adminOrderDelete($orderId)
    {
        $orderDelete = Orders::find($orderId);
        $orderDelete->delete();

        return \redirect(route('viewAllOrders'));
    }

}
