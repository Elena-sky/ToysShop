<?php

namespace App\Http\Controllers;

use App\Goods;
use App\GoodsImages;
use Illuminate\Http\Request;

class GoodController extends Controller
{
    public function goodView($id)
    {
        $images = Goods::find($id)->goodImg;
        $good = Goods::find($id);

        return view('goodView', ['good' => $good, 'images' => $images]);
    }

}
