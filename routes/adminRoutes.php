<?php
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    // Контроллеры в пространстве имён "App\Http\Controllers\Admin"
    Route::get('/', 'AdminController@adminPageView')->name('adminPageView'); // Admin page

    // Product
    Route::get('/product', 'ProductController@actionProductView')->name('productView'); // Display a listing of the product.
    Route::get('/product/view', 'ProductController@viewAddProduct')->name('addNewProductPage'); // Show the form for creating a new product.
    Route::post('/product/add', 'ProductController@actionAddNewProduct')->name('actionNewAddProduct'); // Store a newly created resource in storage.
    Route::get('/product/update/{id}', 'ProductController@viewProductUpdate')->name('productUpdateView'); // Show the form for editing the specified resource.
    Route::post('/product/update/save', 'ProductController@actionProductUpdateSave')->name('actionUpdateSave'); //  Update the specified resource in storage.
    Route::post('/product/delete/{id}', 'ProductController@actionProductDelete')->name('actionDeleteProduct'); // Remove the specified resource from storage.

    // Category
    Route::get('/category', 'CategoryController@viewCategoryPage')->name('viewCategory'); // Display a listing of the category.
    Route::get('/category/add', 'CategoryController@actionAddCategoryView')->name('addCategory'); // Show the form for creating a new category.
    Route::post('/category/add/save', 'CategoryController@actionAdminAddCategory')->name('adminActionAddCategory'); // Store a newly created category in storage.
    Route::get('/category/update/{id}', 'CategoryController@viewAdminUpdateCategory')->name('viewUpdateCategory'); // Show the form for editing the specified category
    Route::post('/category/update/save', 'CategoryController@actionAdminSaveUpdate')->name('actionSaveUpdateCategory'); // Update the specified category in storage.
    Route::get('/category/delete/{id}', 'CategoryController@actionCategoryDelete')->name('actionDeleteCategory'); //Remove the specified category from storage.

    //Permissions
    Route::get('/permissions', 'PermissionController@permissionsViewPage')->name('permissionsView'); // View управление разрешениями
    Route::get('/permissions/create', 'PermissionController@permissionsCreateView')->name('permissionsCreate'); // View создание разрешения
    Route::post('/permissions/create/save', 'PermissionController@permissionsCreateSave')->name('permissionsSaveCreate'); //Action создать
    Route::get('/permissions/update/{id}', 'PermissionController@permissionsUpdateView')->name('permissionsUpdate'); // View редактирование разрешения
    Route::post('/permissions/update/save', 'PermissionController@permissionsUpdateSave')->name('permissionsSaveUpdate'); // View сохранить редактирование
    Route::delete('/permissions/delete/{id}', 'PermissionController@permissionsDeleteAction')->name('permissionsDelete'); // Action удалить разрешение

    //Roles
    Route::get('/roles', 'RoleController@rolesViewPage')->name('rolesView'); // View управление ролями
    Route::get('/roles/create', 'RoleController@roleCreateView')->name('roleCreate'); // View создание новой роли
    Route::post('/roles/create/save', 'RoleController@roleSaveCreate')->name('roleCreateSave'); // Action создать новую роль
    Route::get('/roles/update/{id}', 'RoleController@roleUpdateView')->name('roleUpdate'); // редактировать роль
    Route::post('/roles/update/save', 'RoleController@roleUpdateSave')->name('roleSaveUpdate'); // Action сохранить редактирование роли
    Route::delete('/roles/delete/{id}', 'RoleController@roleDeleteAction')->name('roleDelete'); // Action удаление роли

    // Users
    Route::get('/users', 'UserController@viewUsersList')->name('viewUsers'); // View управление пользователями
    Route::get('/users/create', 'UserController@viewUserCreate')->name('userCreate'); // Создание нового пользователя с ролью
    Route::post('/users/create/save', 'UserController@actionUserStore')->name('userStore'); // Сохранение нового созданного пользователя
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

    // Sliders
    Route::get('/sliders', 'SlideController@viewAllSliders')->name('viewSliders'); //View обзор списка слайдеров
    Route::get('/sliders/add', 'SlideController@viewSliderAddPage')->name('viewSlideAdd'); //View добавление нового слайдера
    Route::post('/sliders/add/save', 'SlideController@actionSaveNewSlide')->name('actionNewSlide'); // Action добавление нового слайдера
    Route::get('/sliders/update/{id}', 'SlideController@viewSlideUpdatePage')->name('viewSlideUpdate'); //View редактирование слайда
    Route::post('/sliders/update/save', 'SlideController@actionSlideSaveUpdate')->name('actionSlideSave'); // Action сохранить редактироование
    Route::get('/sliders/delete/{id}', 'SlideController@actionDeleteSlide')->name('actionSlideDelete'); // Action удалить слайд

    // Orders
    Route::get('/orders', 'OrdersController@adminViewAllOrders')->name('viewAllOrders'); // Display all list of orders.
    Route::get('/orders/order/{id}', 'OrdersController@adminViewOneOrder')->name('viewOneOrder'); // Display one order.
    Route::get('/order/delivery-update/{id}', 'OrdersController@adminViewDeliveryUpdate')->name('viewDeliveryUpdate'); // Show the form for editing the delivery.
    Route::post('/order/delivery-update/save', 'OrdersController@adminActionDeliverySave')->name('actionDeliverySave'); // Update of delivery
    Route::get('/order/order-update/{id}', 'OrdersController@adminViewOrderUpdate')->name('viewOrderUpdate'); // Show page order for editing.
    Route::post('/order/order-updste/save', 'OrdersController@adminActionOrderSave')->name('actionOrderSave'); // Update order page.
    Route::get('/order/delete/{id}', 'OrdersController@adminOrderDelete')->name('orderDelete'); // Remove order.

});

Route::group(['namespace' => 'Ajax', 'prefix' => 'admin'], function () {
// Контроллеры в пространстве имён "App\Http\Controllers\Ajax"
    Route::post('/product/delete-img', 'ProductController@deleteProductImg'); //Ajax удаление картинки из товара
    Route::post('/order/product-action', 'OrdersController@adminActionOrderProduct'); //Ajax редактировать количество или удалить товар в заказе

});