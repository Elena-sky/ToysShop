<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Goods;
use App\Sliders;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class MainController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function categoryAction($id)
    {
        //$goods = Categories::find($id)->goods->paginate(5);
        $goods = Goods::query()->where('category_id', $id)->paginate(6);


        //   $images = Goods::find($id)->goodImg;

        return view('shop', ['goods' => $goods]);
    }

    public function index()
    {
        $categories = \App\Categories::all();
        $slides = Sliders::where('displaing', 1)
            ->get();

        return view('index', compact('categories', 'slides'));
    }
}