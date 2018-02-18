<?php

namespace App\Http\Controllers\Admin;

use App\Categories;
use App\Goods;
use App\GoodsImages;
use App\Http\Controllers\Controller;
use App\ImageUploader;
use App\Orders;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;


class AdminController extends Controller
{
    use ImageUploader;

    /**
     * AdminController constructor.
     */
    public function __construct()
    {
        $this->middleware(['auth', 'clearance'])->except('index', 'show');
    }

    /**
     * Show admin page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function adminPageView()
    {
        $countNewOrders = Orders::where('is_new', 1)->count();
        $countProduct = Goods::all()->count();
        $countUser = User::all()->count();
        $categories = Categories::all();

        $lastNewGoods = Goods::query()
            ->where('is_new', 1)
            ->orderBy('id', 'desc')
            ->limit(8)
            ->get();
        return view('admin.index', compact('countNewOrders', 'countProduct', 'countUser', 'categories', 'lastNewGoods'));
    }

}
