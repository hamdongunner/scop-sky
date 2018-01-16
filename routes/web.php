<?php

/*
 |--------------------------------------------------------------------------
 |     AUTHLESS     AUTHLESS     AUTHLESS     AUTHLESS     AUTHLESS
 |--------------------------------------------------------------------------

 *///--------------------------------------------- APP
Route::get('/', 'HomeController@index');
Route::get('login', 'HomeController@loginView');
Route::post('login', 'HomeController@login');
Route::get('wireless', 'HomeController@getWirelessView');
Route::get('wireless/checkout', 'HomeController@checkoutView');
Route::post('wireless/checkout', 'HomeController@checkoutWireless');
Route::get('redirect', 'HomeController@checkRedirect');
///--------------------------------------------- VUE
Route::get('get-cards', 'HomeController@getCards');
Route::get('get-cart', 'HomeController@getCartCount');
Route::get('get-companies', 'HomeController@getCompanies');
Route::get('cart-add/{id}', 'HomeController@cardAdd');
Route::get('cart-delete/{id}', 'HomeController@cardDelete');
Route::get('company-add/{id}', 'HomeController@companyAdd');
Route::get('price-add/{price}', 'HomeController@priceAdd');
///----------------------------------------------- DASHBOARD
Route::get('/auth', 'DashController@authView');
Route::post('/auth', 'DashController@authAdmin');
/*
 |--------------------------------------------------------------------------
 |     CUSTOMER     CUSTOMER     CUSTOMER     CUSTOMER     CUSTOMER
 |--------------------------------------------------------------------------
 */
Route::group(['middleware' => 'customer'], function () {

    Route::get('ftth', 'HomeController@getFtthView');
    Route::get('ftth/checkout', 'HomeController@checkoutFtthView');
    Route::post('ftth/checkout', 'HomeController@checkout');

});
/*
 |--------------------------------------------------------------------------
 |     ADMIN     ADMIN     ADMIN     ADMIN     ADMIN     ADMIN     ADMIN
 |--------------------------------------------------------------------------
 */
Route::group(['middleware' => 'admin', 'prefix' => 'dashboard'], function () {
    Route::get('/', 'DashController@index');
    Route::get('logout', 'DashController@logout');
    ///--------------------------------------------- ORDERS
    Route::get('orders', 'DashController@orders');
    Route::get('order/view/{id}', 'OrderController@orderView');
    Route::get('order/status/processing/{id}', 'OrderController@orderProcessing');
    Route::get('order/status/processed/{id}', 'OrderController@orderProcessed');

});
/*
 |--------------------------------------------------------------------------
 |     SUPERADMIN     SUPERADMIN     SUPERADMIN     SUPERADMIN     SUPERADMIN
 |--------------------------------------------------------------------------
 */
Route::group(['middleware' => 'superadmin', 'prefix' => 'dashboard'], function () {
    ///--------------------------------------------- ORDERS
    Route::get('orders/csv', 'OrderController@ordersCsvView');
    Route::post('export', 'OrderController@ordersCsv');
    ///--------------------------------------------- ADMINS
    Route::get('admins', 'DashController@admins');
    Route::get('admin/add', 'DashController@adminAddView');
    Route::post('admin/add', 'DashController@adminAdd');
    Route::get('admin/edit/{id}', 'DashController@adminEditView');
    Route::post('admin/edit/{id}', 'DashController@adminEdit');
    Route::get('admin/delete/{id}', 'DashController@adminDelete');
    ///--------------------------------------------- CARDS
    Route::get('cards', 'DashController@cards');
    Route::get('card/add', 'CardController@cardAddView');
    Route::post('card/add', 'CardController@cardAdd');
    Route::get('card/edit/{id}', 'CardController@cardEditView');
    Route::post('card/edit/{id}', 'CardController@cardEdit');
    Route::get('card/delete/{id}', 'CardController@cardDelete');
    Route::get('value', 'CardController@valueView');
    Route::post('value', 'CardController@value');
    ///--------------------------------------------- COMPANIES
    Route::get('companies', 'DashController@companies');
    Route::get('company/add', 'CompanyController@companyAddView');
    Route::post('company/add', 'CompanyController@companyAdd');
    Route::get('company/edit/{id}', 'CompanyController@companyEditView');
    Route::post('company/edit/{id}', 'CompanyController@companyEdit');
    Route::get('company/delete/{id}', 'CompanyController@companyDelete');
    ///--------------------------------------------- FTTH
    Route::get('ftth', 'DashController@ftth');
    Route::get('ftth/add', 'CustomerController@ftthAddView');
    Route::post('ftth/add', 'CustomerController@ftthAdd');
    Route::get('ftth/edit/{id}', 'CustomerController@ftthEditView');
    Route::post('ftth/edit/{id}', 'CustomerController@ftthEdit');
    Route::get('ftth/delete/{id}', 'CustomerController@ftthDelete');
    ///--------------------------------------------- Wireless
    Route::get('wireless/delete/{id}', 'CardController@WirelessDelete');
});