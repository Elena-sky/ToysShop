<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Goods;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class MainController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function categoryAction($id)
    {
        $goods = Categories::find($id)->goods;
        return view('shop', ['goods' => $goods]);
    }
}