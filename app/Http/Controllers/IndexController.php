<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function showSlide()
    {
        $categories = \App\Categories::where('status', 1)->get();
        return view('index', ['categories' => $categories]);
    }
}
