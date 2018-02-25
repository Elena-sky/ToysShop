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

Route::get('/', 'MainController@index')->name('index'); // Show main page.
Route::get('/pwd', 'HomeController@userCustomPasswordChange')->name('customPwdReset'); // Password reset.

//Route::get('/about', function () {
//    return view('about');
//});

//Route::get('about/test', 'Controller@test');
Auth::routes();

//Профиль пользователя и его заказы
Route::get('/profile', 'HomeController@profileUser')->name('profile'); // View user profile.
Route::post('/profile/save', 'HomeController@userActionSaveProfile')->name('actionSaveProfile'); // Save changes to your profile.
Route::get('/old-orders', 'HomeController@userViewOldOrders')->name('viewOldOrders'); // Review of old orders.
Route::get('/old-orders/{id}', 'HomeController@userViewOldOrdersById')->name('viewOldOrdersById'); // View old order by id.


//Контакты
Route::get('/contact', 'MainController@viewContact')->name('contact');
Route::post('/contact/sendmail', 'ContactController@send'); // Ajax Sending a letter of contact form.
Route::get('/contact/page', 'MainController@viewContactPage')->name('contactPage'); // Show contact page.

//Категории и продукты
Route::get('/category/{id}', 'MainController@categoryAction')->name('goodsByCategory'); // Select category.
Route::get('/product/{id}', 'GoodController@productDetail')->name('goodView'); // See the product in more detail.

// Shopping cart
Route::get('/cart', 'CartController@cartView')->name('cartView');  // Display the shopping cart.
Route::put('/cart/item-update', 'CartController@itemUpdate'); // AJAX action update product from the card.
Route::delete('/cart/item-delete', 'CartController@itemDelete'); // AJAX action remove product from the card.
Route::post('/cart/item-add', 'CartController@itemAdd'); // AJAX action add product from the card.

//Заказ
Route::get('/cart/checkout', 'OrderController@viewCheckoutPage')->name('checkoutData'); // Order preview.
Route::post('/cart/checkout/save', 'OrderController@viewCheckoutSave')->name('viewSaveCheckout'); // Action сохранения заказа в базу данных

//Поиск по названию товаров
Route::get('/search/autocomplete', 'SearchController@autocomplete'); // Search by product name.


include_once 'adminRoutes.php';

