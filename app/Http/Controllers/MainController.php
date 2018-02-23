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
use Illuminate\Support\Facades\Config;


class MainController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Select category.
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function categoryAction($id)
    {
        //$goods = Categories::find($id)->goods->paginate(5);
        $goods = Goods::query()->where('category_id', $id)->paginate(Config::get('constants.paginate.category_left'));

        $categoryName = Categories::find($id);
        return view('products.category-left', compact('goods', 'categoryName'));

    }

    /**
     * Show main page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $categories = Categories::where('status', 1)
            ->get();

        $slides = Sliders::where('displaing', 1)
            ->get();

        $lastNewGoods = Goods::query()
            ->where('is_new', 1)
            ->orderBy('id', 'desc')
            ->limit(Config::get('constants.limit.last_new_goods'))
            ->get();

        return view('index', compact('categories', 'slides', 'lastNewGoods'));
    }


    /**
     * Ajax Sending a letter of contact form.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function viewContact()
    {
        $userId = (Auth::check()) ? Auth::id() : ''; //проверка на пользователя

        if (!empty($userId)) {
            $user = User::find($userId);
        }

        return view('info.contact', compact('user'));
    }


    /**
     * Show contact page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function viewContactPage()
    {
        return view('info.contactPage');
    }


}