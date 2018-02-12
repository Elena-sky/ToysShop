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

    public function __construct()
    {
        $this->middleware(['auth', 'clearance'])->except('index', 'show');
    }

    public function adminPageView()
    {
        $countNewOrders = Orders::where('is_new', 1)->count();
        $countProduct = Goods::all()->count();
        $countUser = User::all()->count();

        return view('admin.index', ['countNewOrders' => $countNewOrders, 'countProduct' => $countProduct, 'countUser' => $countUser]);
    }








}
