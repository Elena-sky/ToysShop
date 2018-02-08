<?php

namespace App\Http\Controllers\Admin;

use App\Categories;
use App\Goods;
use App\GoodsImages;
use App\Http\Controllers\Controller;
use App\ImageUploader;
use App\Orders;
use App\OrdersDelivery;
use App\OrdersGoods;
use App\Sliders;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;


class AdminController extends Controller
{
    use ImageUploader;

    // Index

    public function adminPageView()
    {
        $countNewOrders = Orders::where('is_new', 1)->count();
        $countProduct = Goods::all()->count();
        $countUser = User::all()->count();


        return view('admin.index', ['countNewOrders' => $countNewOrders, 'countProduct' => $countProduct, 'countUser' => $countUser]);
    }

    // Управление товарами
    public function actionProductView()
    {

        $goods = Goods::query()
            ->orderBy('id', 'desc')
            ->paginate(10);
        $category = Categories::getCategories();

        return view('admin.product.productChange', ['goods' => $goods, 'category' => $category]);
    }

    // View page добавления нового товара
    public function viewAddProduct()
    {
        $category = Categories::getCategories();

        return view('admin.product.productAdd', ['categories' => $category]);
    }

    // Action добавление нового товара
    public function actionAddNewProduct(Request $request)
    {
        $path = '/goods';  // Папка для загрузки картинок
        $fileName = self::uploader($request, $path);
        $data = Input::except(['_method', '_token']);

        $good = Goods::create($data);
        $productId = $good->id;

        if (!empty($fileName)) {
            foreach ($fileName as $onefile) {
                $dataImages = ['filename' => $onefile, 'product_id' => $productId];

                GoodsImages::create($dataImages);
            }
        }


        return \redirect(route('addNewProductPage'));
    }

    // View page редактирования товара
    public function viewProductUpdate($id)
    {
        $category = Categories::getCategories();


        $good = Goods::find($id);
        $images = Goods::find($id)->goodImg;
        $productImages = ($images->isEmpty()) ? false : $images;
//        $images = $good->goodImg;
        $imagesName = array_pluck($images, 'filename');

        return view('admin.product.productUpdate', ['good' => $good], ['category' => $category, 'images' => $productImages]);
    }

    // Action запись изменений товара в BD
    public function actionProductUpdateSave(Request $request)
    {
        //на 1 картинку
//        $fileName = self::uploader($request);
//        $data = ['image' => $fileName];
//        $data += Input::except(['_method', '_token']);
//
//        $goodData = Goods::find($data['id']);
//        $goodData->update($data);

        $path = '/goods';  // Папка для загрузки картинок
        $fileName = self::uploader($request, $path);

        $data = Input::except(['_method', '_token']);
        $goodData = Goods::find($data['id']);
        $goodData->update($data);

        $productId = $goodData->id;

        if (!empty($fileName)) {
            foreach ($fileName as $onefile) {
                $dataImages = ['filename' => $onefile, 'product_id' => $productId];
                GoodsImages::create($dataImages);
            }
        }

        return \redirect(route('productView'));
    }

    // Action удаление товара в BD
    public function actionProductDelete($id)
    {
        $goodDelete = Goods::find($id);
        $goodDelete->goodImg()->delete();
        $goodDelete->delete();

        return \redirect(route('productView'));
    }




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

    //View редактировать количество товаров в заказе
    public function adminActionOrderProduct()
    {
        $data = Input::get();
        $orderGoods = OrdersGoods::find($data['ogid']);

        if ($data['action'] == 'delete' && !empty($orderGoods)) {
            $orderGoods->delete();
        }

        if ($data['action'] == 'update' && !empty($orderGoods)) {
            $orderGoods->update(['count' => $data['oldVal']]);
        }
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

    //Action Удалить заказ
    public function adminOrderDelete($orderId)
    {
        $orderDelete = Orders::find($orderId);
        $orderDelete->delete();
        return \redirect(route('viewAllOrders'));
    }


}
