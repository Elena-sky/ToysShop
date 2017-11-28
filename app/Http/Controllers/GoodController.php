<?php

namespace App\Http\Controllers;

use App\Goods;
use Illuminate\Http\Request;

class GoodController extends Controller
{
    public function goodView($id)
    {
        $good = Goods::find($id);
        return view('goodView', ['good' => $good]);
    }

}
