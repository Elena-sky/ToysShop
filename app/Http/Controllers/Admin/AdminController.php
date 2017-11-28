<?php

namespace App\Http\Controllers\Admin;

use App\Categories;
use App\Goods;
use App\Http\Controllers\Controller;
use App\ImageUploader;
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
        //dd('It work!');
        return view('admin.index');

    }


    // Управление категориями
    public function viewCategoryPage()
    {
        $categories = Categories::all();

        return view('admin.categoryView', ['categories' => $categories]);

    }

    // View редактирование категории
    public function viewAdminUpdateCategory($id)
    {
        $category = Categories::find($id);

        // добавть сюда
        return view('admin.categoryUpdate', ['category' => $category]);
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
        return view('admin.categoryAdd');
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
        $goods = Goods::all();

        return view('admin.productChange', ['goods' => $goods]);
    }

    // View page добавления нового товара
    public function viewAddProduct()
    {
        $category = Categories::getCategories();

        return view('admin.productAdd', ['categories' => $category]);
    }

    // Action добавление нового товара
    public function actionAddNewProduct(Request $request)
    {
        $fileName = self::uploader($request);
        $data = ['image' => $fileName];
        $data += Input::except(['_method', '_token']);

        Goods::create($data);

        return \redirect(route('addNewProductPage'));
    }

    // View page редактирования товара
    public function viewProductUpdate($id)
    {
        $category = Categories::getCategories();

        $good = Goods::find($id);

        return view('admin.productUpdate', ['good' => $good], ['category' => $category]);
    }

    // Action запись изменений товара в BD
    public function actionProductUpdateSave(Request $request)
    {
        $fileName = self::uploader($request);
        $data = ['image' => $fileName];
        $data += Input::except(['_method', '_token']);

        $goodData = Goods::find($data['id']);
        $goodData->update($data);
        // dd($goodData);

        return \redirect(route('productView'));
    }

    // Action удаление товара в BD
    public function actionProductDelete($id)
    {
        $goodDelete = Goods::find($id);
        $goodDelete->delete();
        return \redirect(route('productView'));
    }


}
