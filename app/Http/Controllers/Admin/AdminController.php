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
        return view('admin.index');
    }


    // Управление категориями
    public function viewCategoryPage()
    {
        $categories = Categories::query()->orderBy('id', 'desc')->get();

        return view('admin.category.categoryView', ['categories' => $categories]);
    }

    // View редактирование категории
    public function viewAdminUpdateCategory($id)
    {
        $category = Categories::find($id);

        return view('admin.category.categoryUpdate', ['category' => $category]);
    }

    // Action сохранить редактироование категории
    public function actionAdminSaveUpdate()
    {
        $data = $_POST;
        $categoryData = Categories::find($data['id']);
        $categoryData->update($data);
        return \redirect(route('viewCategory'));
    }

    //Action удаление категории
    public function actionCategoryDelete($id)
    {
        $categoryDelete = Categories::find($id);
        $categoryDelete->delete();
        return \redirect(route('viewCategory'));
    }


    public function actionAddCategoryView()
    {
        return view('admin.category.categoryAdd');
    }

    // Добавление новой категории
    public function actionAdminAddCategory()
    {
        $data = $_POST;

        Categories::create($data);

        return \redirect(route('addCategory'));
    }


    // Управление товарами
    public function actionProductView()
    {

        $goods = Goods::query()->orderBy('id', 'desc')->paginate(10);
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

//        $images = $good->goodImg;
        $imagesName = array_pluck($images, 'filename');

        return view('admin.product.productUpdate', ['good' => $good], ['category' => $category, 'images' => $images]);
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

    //Управление пользователями
    public function viewUsersList()
    {
        $users = User::all();
        return view('admin.user.usersView', ['users' => $users]);
    }

    //View page редактирование пользователя
    public function viewUserUpdate($id)
    {
        $user = User::find($id);

        return view('admin.user.userUpdate', ['user' => $user]);
    }

    // Action сохранить редактироование пользователя
    public function actionSaveUserUpdate()
    {
        $data = $_POST;
        $userData = User::find($data['id']);
        $userData->update($data);

        return \redirect(route('viewUsers'));
    }

    //посмотреть профиль пользователя
    public function adminViewUserPage($id)
    {
        $user = User::find($id);
        return view('admin.user.userPage', ['user' => $user]);
    }




    //Управление содержимым сайта

    // View Управление слайдерами
    public function viewAllSliders()
    {
        $sliders = Sliders::all();

        return view('admin.slide.slideView', ['sliders' => $sliders]);
    }

    //View Добавление нового слайдера
    public function viewSliderAddPage()
    {

        return view('admin.slide.slideAdd');
    }

    // Action Добавление нового слайдера
    public function actionSaveNewSlide(Request $request)
    {

        $path = '/sliders';  // Папка для загрузки слайдов
        $fileName = self::uploader($request, $path);

        $data = Input::except(['_method', '_token']);
        $displaing = $data['displaing'];

        foreach ($fileName as $onefile) {
            $dataImages = ['filename' => $onefile, 'displaing' => $displaing];

            Sliders::create($dataImages);
        }

        return \redirect(route('viewSlideAdd'));
    }

    // View редактирование слайда
    public function viewSlideUpdatePage($id)
    {
        $slide = Sliders::find($id);

        return view('admin.slide.slideUpdate', ['slide' => $slide]);
    }

    // Action сохранить редактироование
    public function actionSlideSaveUpdate()
    {
        $data = $_POST;
        $slideData = Sliders::find($data['id']);
        $slideData->update($data);
        return \redirect(route('viewSliders'));
    }

    // Action удалить слайд
    public function actionDeleteSlide($id)
    {
        $slideDelete = Sliders::find($id);
        $slideDelete->delete();
        return \redirect(route('viewSliders'));
    }

    //ЗАКАЗЫ

    // View всех заказов
    public function adminViewAllOrders()
    {
        $orders = Orders::all();
        return view('admin.orders.ordersView', ['orders' => $orders]);
    }

    // View заказа
    public function adminViewOneOrder($orderId)
    {
        $order = Orders::find($orderId);
        //dd($order->orderGoods);
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


}
