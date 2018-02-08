<?php
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    // Контроллеры в пространстве имён "App\Http\Controllers\Admin"
    Route::get('/', 'AdminController@adminPageView')->name('adminPageView'); // Админпанель

    Route::get('/product', 'AdminController@actionProductView')->name('productView'); // Управление товарами
    Route::get('/product/view', 'AdminController@viewAddProduct')->name('addNewProductPage'); // View page добавления нового товара
    Route::post('/product/add', 'AdminController@actionAddNewProduct')->name('actionNewAddProduct'); //Добавление нового товара
    Route::get('/product/update/{id}', 'AdminController@viewProductUpdate')->name('productUpdateView'); // Редактирование товара
    Route::post('/product/update/save', 'AdminController@actionProductUpdateSave')->name('actionUpdateSave'); // Action редактирование товара
    Route::get('/product/delete/{id}', 'AdminController@actionProductDelete')->name('actionDeleteProduct'); // Action удаление товара


    //Управление категориями
    Route::get('/category', 'CategoryController@viewCategoryPage')->name('viewCategory'); // View управление категориями
    Route::get('/category/add', 'CategoryController@actionAddCategoryView')->name('addCategory'); // View page добавление новой категории
    Route::post('/category/add/save', 'CategoryController@actionAdminAddCategory')->name('adminActionAddCategory'); // Добавление категории
    Route::get('/category/update/{id}', 'CategoryController@viewAdminUpdateCategory')->name('viewUpdateCategory'); // View редактирование категории
    Route::post('/category/update/save', 'CategoryController@actionAdminSaveUpdate')->name('actionSaveUpdateCategory'); // Action сохранить редактироование категории
    Route::get('/category/delete/{id}', 'CategoryController@actionCategoryDelete')->name('actionDeleteCategory'); //Action удаление категории

    Route::get('/users', 'UserController@viewUsersList')->name('viewUsers'); // View управление пользователями
    Route::get('/users/update/{id}', 'UserController@viewUserUpdate')->name('viewUserUpdate'); // View редактирование пользователя
    Route::post('/users/update/save', 'UserController@actionSaveUserUpdate')->name('actionSaveUser'); // Action сохранить редактироование пользователя
    Route::get('/users/delete/{id}', 'UserController@actionUserDelete')->name('userDelete'); //Удаление пользователя
    Route::get('/users/user/{id}', 'UserController@adminViewUserPage')->name('viewUserPage'); //посмотреть профиль пользователя

    Route::group(['middleware' => 'web'], function () {
        Route::get('fileUpload', function () {
            return view('fileUpload');
        });


        Route::post('fileUpload', ['as' => 'fileUpload', 'uses' => 'HomeController@fileUpload']);
    });

    Route::get('/sliders', 'SlideController@viewAllSliders')->name('viewSliders'); //View обзор списка слайдеров
    Route::get('/sliders/add', 'SlideController@viewSliderAddPage')->name('viewSlideAdd'); //View добавление нового слайдера
    Route::post('/sliders/add/save', 'SlideController@actionSaveNewSlide')->name('actionNewSlide'); // Action добавление нового слайдера
    Route::get('/sliders/update/{id}', 'SlideController@viewSlideUpdatePage')->name('viewSlideUpdate'); //View редактирование слайда
    Route::post('/sliders/update/save', 'SlideController@actionSlideSaveUpdate')->name('actionSlideSave'); // Action сохранить редактироование
    Route::get('/sliders/delete/{id}', 'SlideController@actionDeleteSlide')->name('actionSlideDelete'); // Action удалить слайд

    Route::get('/orders', 'AdminController@adminViewAllOrders')->name('viewAllOrders'); // View всех заказов
    Route::get('/orders/order/{id}', 'AdminController@adminViewOneOrder')->name('viewOneOrder'); // View заказа
    Route::post('/order/product-action', 'AdminController@adminActionOrderProduct')->name('actionOrderProduct');  //Ajax редактировать количество или удалить товар в заказе
    Route::get('/order/delivery-update/{id}', 'AdminController@adminViewDeliveryUpdate')->name('viewDeliveryUpdate'); // View редактировать данные о доставке
    Route::post('/order/delivery-update/save', 'AdminController@adminActionDeliverySave')->name('actionDeliverySave'); //Action сохранить данные о доставке
    Route::get('/order/order-update/{id}', 'AdminController@adminViewOrderUpdate')->name('viewOrderUpdate'); // View редактировать заказ
    Route::post('/order/order-updste/save', 'AdminController@adminActionOrderSave')->name('actionOrderSave'); // Action созранить редактирование заказа
    Route::get('/order/delete/{id}', 'AdminController@adminOrderDelete')->name('orderDelete'); //Action Удалить заказ

});