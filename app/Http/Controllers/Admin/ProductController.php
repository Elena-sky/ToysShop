<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Categories;
use App\Goods;
use App\GoodsImages;
use App\ImageUploader;
use Illuminate\Support\Facades\Input;


class ProductController extends Controller
{
    use ImageUploader;

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

}
