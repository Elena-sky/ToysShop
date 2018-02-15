<?php

namespace App\Http\Controllers;

use App\Goods;
use App\GoodsImages;
use Illuminate\Http\Request;

class GoodController extends Controller
{
    /**
     * See the product in more detail.
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function productDetail($id)
    {
        $images = Goods::find($id)->goodImg;
        $productImages = ($images->isEmpty()) ? false : $images;

        $good = Goods::find($id);
        return view('products.detail', ['good' => $good, 'images' => $productImages]);
    }

}
