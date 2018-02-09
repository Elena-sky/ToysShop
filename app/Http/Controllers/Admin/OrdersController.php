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
    //ЗАКАЗЫ

    // View всех заказов
    public function adminViewAllOrders()
    {
        $orders = (empty($_GET['isnew'])) ? Orders::all() : Orders::where('is_new', $_GET['isnew'])->get();
        return view('admin.orders.ordersView', ['orders' => $orders]);
    }

    // View заказа
    public function adminViewOneOrder($orderId)
    {
        $order = Orders::find($orderId);
        $userName = User::getNameById($order->user_id);
        $delivery = OrdersDelivery::find($order->delivery_id);

        return view('admin.orders.oneOrder', ['order' => $order, 'delivery' => $delivery, 'userName' => $userName]);
    }

    // View редактировать данные о доставке
    public function adminViewDeliveryUpdate($orderId)
    {
        $order = Orders::find($orderId);
        $delivery = OrdersDelivery::find($order->delivery_id);
        return view('admin.orders.deliveryUpdate', ['delivery' => $delivery, 'orderId' => $orderId]);
    }

    //Action сохранить данные о доставке
    public function adminActionDeliverySave()
    {
        $data = $_POST;
        $orderid = $data['orderId'];
        $deliveryData = OrdersDelivery::find($data['id']);
        $deliveryData->update($data);

        return \redirect(route('viewOneOrder', ['orderid' => $orderid]));
    }

    // View редактировать заказ
    public function adminViewOrderUpdate($orderId)
    {
        $order = Orders::find($orderId);
        return view('admin.orders.orderUpdate', ['order' => $order]);

    }

    // Action созранить редактирование заказа
    public function adminActionOrderSave()
    {
        $data = $_POST;
        $orderid = $data['id'];
        $orderData = Orders::find($orderid);
        $orderData->update($data);

        return \redirect(route('viewOneOrder', ['orderid' => $orderid]));
    }

    //удаление из товара 1 картинки
    public function deleteProductImg()
    {
        $data = $_POST;
        dd($data);
    }

    //Action Удалить заказ
    public function adminOrderDelete($orderId)
    {
        $orderDelete = Orders::find($orderId);
        $orderDelete->delete();
        return \redirect(route('viewAllOrders'));
    }
}
