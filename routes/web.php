<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'MainController@index');
/*Route::get('/', function () {
    return view('index', ['categories' => \App\Categories::all(), 'slides' => \App\Sliders::all()]);
});*/

Route::get('/about', function () {
    return view('about');
});

Route::get('about/test', 'Controller@test');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'HomeController@profileUser')->name('profile');

Route::get('/category/{id}', 'MainController@categoryAction')->name('goodsByCategory'); //выбор категории

Route::get('/product/{id}', 'GoodController@goodView')->name('goodView'); //обзор продукта

Route::get('/cart', 'CartController@cartView')->name('cartView');  //корзина

//Route::get('/cart/add/{id}', 'CartController@actionAdd')->name('actionAdd'); //добавляет товар в корзину

//Route::get('/cart/delete/{id}', 'CartController@actionDelete')->name('actionDelete'); //удаляет товар из корзины

Route::post('cart/item-update', 'CartController@actionC')->name('actionDelete'); //удаляет товар из корзины

Route::get('/cart/checkout', 'CartController@viewCheckoutPage')->name('viewCheckout');
Route::post('/cart/checkout/save', 'CartController@viewCheckoutSave')->name('viewSaveCheckout');



include_once 'adminRoutes.php';






// Корзина:
//'cart/checkout' => 'cart/checkout', // actionAdd в CartController
//    'cart/delete/([0-9]+)' => 'cart/delete/$1', // actionDelete в CartController
//    'cart/add/([0-9]+)' => 'cart/add/$1', // actionAdd в CartController
//    'cart/addAjax/([0-9]+)' => 'cart/addAjax/$1', // actionAddAjax в CartController
//    'cart' => 'cart/index', // actionIndex в CartController


//// Товар:
//'product/([0-9]+)' => 'product/view/$1', // actionView в ProductController
//    // Каталог:
//    'catalog' => 'catalog/index', // actionIndex в CatalogController
//    // Категория товаров:
//    'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2', // actionCategory в CatalogController
//    'category/([0-9]+)' => 'catalog/category/$1', // actionCategory в CatalogController