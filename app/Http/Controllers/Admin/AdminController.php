<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminPageView()
    {
        //dd('It work!');
        return view('admin.index');

    }
}
