<?php

namespace App\Http\Controllers\Ajax;

use App\GoodsImages;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    //удаление из товара 1 картинки
    public function deleteProductImg()
    {
        $data = $_POST;

        $imgDelete = GoodsImages::find($data['imgId']);
        $path = "uploads/goods/" . $imgDelete->filename;
        if (file_exists($path)) {
            unlink($path);
            return true;
        }
        $imgDelete->delete();
    }
}