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

Route::get('/', 'MainController@index')->name('index');
Route::get('/pwd', 'HomeController@userCustomPasswordChange')->name('customPwdReset');

Route::get('/about', function () {
    return view('about');
});

Route::get('about/test', 'Controller@test');
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

//Профиль пользователя и его заказы
Route::get('/profile', 'HomeController@profileUser')->name('profile'); //User view профиль
Route::post('/profile/save', 'HomeController@userActionSaveProfile')->name('actionSaveProfile'); //User сохраняет изменения в профиле
Route::get('/old-orders', 'HomeController@userViewOldOrders')->name('viewOldOrders'); // Обзор старых заказов
Route::get('/old-orders/{id}', 'HomeController@userViewOldOrdersById')->name('viewOldOrdersById'); // Обзор старого заказа по id


//Контакты
Route::get('/contact', 'MainController@viewContact')->name('contact');
Route::post('/contact/sendmail', 'Ajax\ContactController@send'); // Отправка письма контактной формы
Route::get('/contact/page', 'MainController@viewContactPage')->name('contactPage'); // Контакты

//Категории и продукты
Route::get('/category/{id}', 'MainController@categoryAction')->name('goodsByCategory'); //выбор категории
Route::get('/product/{id}', 'GoodController@productDetail')->name('goodView'); //обзор продукта

//Корзина
Route::get('/cart', 'CartController@cartView')->name('cartView');  //корзина
Route::post('cart/item-update', 'CartController@actionC'); // Ajax Действия юзера в корзине : добавление, редактирование, удаление

//Заказ
Route::get('cart/checkout', 'OrderController@viewCheckoutPage')->name('checkoutData'); // Заполнение данных заказа
Route::post('/cart/checkout/save', 'OrderController@viewCheckoutSave')->name('viewSaveCheckout'); // Action сохранения заказа в базу данных

//Поиск по названию товаров
Route::get('/search/autocomplete', 'SearchController@autocomplete'); // Search


include_once 'adminRoutes.php';

