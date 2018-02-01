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
        $goods = Goods::query()->where('category_id', $id)->paginate(8);


        //   $images = Goods::find($id)->goodImg;

        return view('category-left', ['goods' => $goods]);

    }

    public function index()
    {
        $categories = Categories::where('status', 1)
            ->get();

        $slides = Sliders::where('displaing', 1)
            ->get();

        return view('index', compact('categories', 'slides'));
    }

    public function index1()
    {
        $categories = Categories::where('status', 1)
            ->get();

        $slides = Sliders::where('displaing', 1)
            ->get();
        return view('index1', compact('categories', 'slides'));
    }
}