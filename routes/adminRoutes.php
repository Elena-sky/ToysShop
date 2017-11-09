<?php
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    // Контроллеры в пространстве имён "App\Http\Controllers\Admin"
    Route::get('/', 'AdminController@adminPageView')->name('adminPageView'); // Админпанель


    //// Управление товарами:
//'admin/product/create' => 'adminProduct/create',
//    'admin/product/update/([0-9]+)' => 'adminProduct/update/$1',
//    'admin/product/delete/([0-9]+)' => 'adminProduct/delete/$1',
//    'admin/product' => 'adminProduct/index',
//    // Управление категориями:
//    'admin/category/create' => 'adminCategory/create',
//    'admin/category/update/([0-9]+)' => 'adminCategory/update/$1',
//    'admin/category/delete/([0-9]+)' => 'adminCategory/delete/$1',
//    'admin/category' => 'adminCategory/index',
//    // Управление заказами:
//    'admin/order/update/([0-9]+)' => 'adminOrder/update/$1',
//    'admin/order/delete/([0-9]+)' => 'adminOrder/delete/$1',
//    'admin/order/view/([0-9]+)' => 'adminOrder/view/$1',
//    'admin/order' => 'adminOrder/index',
//    // Админпанель:
//    'admin' => 'admin/index',

});