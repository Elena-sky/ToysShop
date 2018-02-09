<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Goods;
use App\Sliders;
use App\User;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;


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

    // Отправка письма контактной формы
    public function viewContact()
    {
        $userId = (Auth::check()) ? Auth::id() : ''; //проверка на пользователя

        if (!empty($userId)) {
            $user = User::find($userId);
        }

        return view('info.contact', compact('user'));
    }

    // Контакты
    public function viewContactPage()
    {
        return view('info.contactPage');
    }


}