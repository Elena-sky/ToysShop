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

        $categoryName = Categories::find($id);
        return view('products.category-left', compact('goods', 'categoryName'));

    }

    public function index()
    {
        $categories = Categories::where('status', 1)
            ->get();

        $slides = Sliders::where('displaing', 1)
            ->get();

        $lastNewGoods = Goods::query()
            ->where('is_new', 1)
            ->orderBy('id', 'desc')
            ->limit(8)
            ->get();

        return view('index', compact('categories', 'slides', 'lastNewGoods'));
    }

    public function viewContact()
    {

        return view('contact');
    }

}