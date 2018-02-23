<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Categories;
use App\Goods;
use App\GoodsImages;
use App\ImageUploader;
use Illuminate\Support\Facades\Input;

use App\Post;
use Auth;
use Session;


class ProductController extends Controller
{
    use ImageUploader;


    public function __construct()
    {
        $this->middleware(['auth', 'clearance']);
    }


    /**
     * Display a listing of the product.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function actionProductView()
    {
        $goods = Goods::query()
            ->orderBy('id', 'desc')
            ->paginate(10);
        $category = Categories::getCategories();

        return view('admin.product.productChange', compact('goods', 'category'));
    }


    /**
     * Show the form for creating a new product.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function viewAddProduct()
    {
        $categories = Categories::getCategories();

        return view('admin.product.productAdd', compact('categories'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function actionAddNewProduct(Request $request)
    {
        //Validating
        $this->validate($request, [
            'name' => 'required|max:100',
            'code' => 'required|integer',
            'made' => 'required',
            'category_id' => 'required',
            'price' => 'required|numeric',
            'is_new' => 'boolean',
            'is_avaliable' => 'boolean',
            'displaing' => 'boolean',
            'description' => 'required',
        ]);

        $path = '/goods';  // Папка для загрузки картинок
        $fileName = self::uploader($request, $path);
        $data = Input::except(['_method', '_token']);

        $good = Goods::create($data);
        $productId = $good->id;

        if (!empty($fileName)) {
            foreach ($fileName as $onefile) {
                $dataImages[] = ['filename' => $onefile, 'product_id' => $productId];

            }

            GoodsImages::insert($dataImages);
        }

        //Display a successful message upon save
        return redirect()->route('addNewProductPage')
            ->with('flash_message', 'Товар,
             ' . $good->name . ' создан');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function viewProductUpdate($id)
    {
        $category = Categories::getCategories();

        $good = Goods::find($id);

        $image = Goods::find($id)->goodImg;
        $images = ($image->isEmpty()) ? false : $image;
        $imagesName = array_pluck($image, 'filename');

        return view('admin.product.productUpdate', compact('good', 'category', 'images'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function actionProductUpdateSave(Request $request)
    {
        //на 1 картинку
//        $fileName = self::uploader($request);
//        $data = ['image' => $fileName];
//        $data += Input::except(['_method', '_token']);
//
//        $goodData = Goods::find($data['id']);
//        $goodData->update($data);

        $this->validate($request, [
            'name' => 'required|max:100',
            'code' => 'required|integer',
            'made' => 'required',
            'category_id' => 'required',
            'price' => 'required|numeric',
            'is_new' => 'boolean',
            'is_avaliable' => 'boolean',
            'displaing' => 'boolean',
            'description' => 'required',
        ]);

        $path = '/goods';  // Папка для загрузки картинок
        $fileName = self::uploader($request, $path);

        $data = Input::except(['_method', '_token']);
        $goodData = Goods::find($request->route('id'));
        $goodData->update($data);

        $productId = $goodData->id;

        if (!empty($fileName)) {
            foreach ($fileName as $onefile) {
                $dataImages = ['filename' => $onefile, 'product_id' => $productId];
                GoodsImages::create($dataImages);
            }
        }

        return redirect()->route('productView')
            ->with('flash_message', 'Товар, 
            ' . $goodData->name . ' сохранен');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function actionProductDelete($id)
    {
        $goodDelete = Goods::find($id);
        $goodDelete->goodImg()->delete();
        $goodDelete->delete();

        return redirect()->route('productView')
            ->with('flash_message',
                'Товар успешно удален');
    }

}
