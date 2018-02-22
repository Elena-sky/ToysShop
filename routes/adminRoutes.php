<?php
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    // Контроллеры в пространстве имён "App\Http\Controllers\Admin"
    Route::get('/', 'AdminController@adminPageView')->name('adminPageView'); // Admin page

    // Product
    Route::get('/product', 'ProductController@actionProductView')->name('productView'); // Display a listing of the product.
    Route::get('/product/view', 'ProductController@viewAddProduct')->name('addNewProductPage'); // Show the form for creating a new product.
    Route::post('/product/add', 'ProductController@actionAddNewProduct')->name('actionNewAddProduct'); // Store a newly created resource in storage.
    Route::get('/product/update/{id}', 'ProductController@viewProductUpdate')->name('productUpdateView'); // Show the form for editing the specified resource.
    Route::put('/product/save/{id}', 'ProductController@actionProductUpdateSave')->name('actionUpdateSave'); //  Update the specified resource in storage.
    Route::delete('/product/delete/{id}', 'ProductController@actionProductDelete')->name('actionDeleteProduct'); // Remove the specified resource from storage.

    // Category
    Route::get('/category', 'CategoryController@viewCategoryPage')->name('viewCategory'); // Display a listing of the category.
    Route::get('/category/add', 'CategoryController@actionAddCategoryView')->name('addCategory'); // Show the form for creating a new category.
    Route::post('/category/add/save', 'CategoryController@actionAdminAddCategory')->name('adminActionAddCategory'); // Store a newly created category in storage.
    Route::get('/category/update/{id}', 'CategoryController@viewAdminUpdateCategory')->name('viewUpdateCategory'); // Show the form for editing the specified category
    Route::put('/category/save/{id}', 'CategoryController@actionAdminSaveUpdate')->name('actionSaveUpdateCategory'); // Update the specified category in storage.
    Route::delete('/category/delete/{id}', 'CategoryController@actionCategoryDelete')->name('actionDeleteCategory'); //Remove the specified category from storage.

    //Permissions
    Route::get('/permissions', 'PermissionController@permissionsViewPage')->name('permissionsView'); // Display a listing of the permission.
    Route::get('/permissions/create', 'PermissionController@permissionsCreateView')->name('permissionsCreate'); // Show the form for creating a new permission.
    Route::post('/permissions/create/save', 'PermissionController@permissionsCreateSave')->name('permissionsSaveCreate'); // Store a newly created permission in storage.
    Route::get('/permissions/update/{id}', 'PermissionController@permissionsUpdateView')->name('permissionsUpdate'); // Show the form for editing the specified permission.
    Route::put('/permissions/save/{id}', 'PermissionController@permissionsUpdateSave')->name('permissionsSaveUpdate'); // Update the specified permission in storage.
    Route::delete('/permissions/delete/{id}', 'PermissionController@permissionsDeleteAction')->name('permissionsDelete'); // Remove the specified permission from storage.

    //Roles
    Route::get('/roles', 'RoleController@rolesViewPage')->name('rolesView'); // Display a listing of the resource.
    Route::get('/roles/create', 'RoleController@roleCreateView')->name('roleCreate'); // Show the form for creating a new resource.
    Route::post('/roles/create/save', 'RoleController@roleSaveCreate')->name('roleCreateSave'); // Store a newly created resource in storage.
    Route::get('/roles/update/{id}', 'RoleController@roleUpdateView')->name('roleUpdate'); // Show the form for editing the specified resource.
    Route::put('/roles/save/{id}', 'RoleController@roleUpdateSave')->name('roleSaveUpdate'); // Update the specified resource in storage.
    Route::delete('/roles/delete/{id}', 'RoleController@roleDeleteAction')->name('roleDelete'); // Remove the specified resource from storage.

    // Users
    Route::get('/users', 'UserController@viewUsersList')->name('viewUsers'); // Display a listing of the resource.
    Route::get('/users/create', 'UserController@viewUserCreate')->name('userCreate'); // Show the form for creating a new resource.
    Route::post('/users/create/save', 'UserController@actionUserStore')->name('userStore'); // Store a newly created resource in storage.
    Route::get('/users/update/{id}', 'UserController@viewUserUpdate')->name('viewUserUpdate'); // Show the form for editing the specified resource.
    Route::put('/users/save/{id}', 'UserController@actionSaveUserUpdate')->name('actionSaveUser'); // Update the specified resource in storage.
    Route::delete('/users/delete/{id}', 'UserController@actionUserDelete')->name('userDelete'); // Remove the specified resource from storage.
    Route::get('/users/user/{id}', 'UserController@adminViewUserPage')->name('viewUserPage'); // View user profile.


    Route::group(['middleware' => 'web'], function () {
        Route::get('fileUpload', function () {
            return view('fileUpload');
        });

        Route::post('fileUpload', ['as' => 'fileUpload', 'uses' => 'HomeController@fileUpload']);
    });

    // Sliders
    Route::get('/sliders', 'SlideController@viewAllSliders')->name('viewSliders'); // Display a listing of the sliders.
    Route::get('/sliders/add', 'SlideController@viewSliderAddPage')->name('viewSlideAdd'); // Show the form for creating a new slide.
    Route::post('/sliders/add/save', 'SlideController@actionSaveNewSlide')->name('actionNewSlide'); // Store a newly created slider in storage.
    Route::get('/sliders/update/{id}', 'SlideController@viewSlideUpdatePage')->name('viewSlideUpdate'); // Show the form for editing a slide.
    Route::put('/sliders/save/{id}', 'SlideController@actionSlideSaveUpdate')->name('actionSlideSave'); // Update a slide in storage.
    Route::delete('/sliders/delete/{id}', 'SlideController@actionDeleteSlide')->name('actionSlideDelete'); // Remove a slide from storage.

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
    Route::post('/product/delete-img', 'ProductController@deleteProductImg'); // Ajax remove from the product a picture
    Route::post('/order/product-action', 'OrdersController@adminActionOrderProduct'); // Ajax edit the quantity or delete the item in the order

});