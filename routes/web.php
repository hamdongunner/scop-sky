<?php

/*
 |--------------------------------------------------------------------------
 |     AUTHLESS     AUTHLESS     AUTHLESS     AUTHLESS     AUTHLESS
 |--------------------------------------------------------------------------

 *///---------------------------------------------APP
Route::get('/', 'HomeController@index');
Route::get('get-cards', 'HomeController@getCards');
Route::get('cart/add/{id}', 'HomeController@cardAdd');
Route::get('wireless','HomeController@getWirelessView');
Route::get('checkout','HomeController@checkoutView');
Route::get('login','HomeController@loginView');
Route::post('login','HomeController@login');
//-----------------------------------------------DASHBOARD
Route::get('/auth','DashController@authView');
Route::post('/auth','DashController@authAdmin');
/*
 |--------------------------------------------------------------------------
 |     CUSTOMER     CUSTOMER     CUSTOMER     CUSTOMER     CUSTOMER
 |--------------------------------------------------------------------------
 */
Route::group(['middleware'=>'customer'], function () {

    Route::get('ftth','HomeController@getFtthView');
});
/*
 |--------------------------------------------------------------------------
 |     ADMIN     ADMIN     ADMIN     ADMIN     ADMIN     ADMIN     ADMIN
 |--------------------------------------------------------------------------
 */
Route::group(['middleware'=>'admin','prefix' => 'dashboard'], function () {
    Route::get('/','DashController@index');
    Route::get('logout','DashController@logout');
    ///---------------------------------------------ADMINS
    Route::get('admins','DashController@admins');
    Route::get('admin/add','DashController@adminAddView');
    Route::post('admin/add','DashController@adminAdd');
    Route::get('admin/delete/{id}','DashController@adminDelete');
    Route::get('admin/edit/{id}','DashController@adminEditView');
    Route::post('admin/edit/{id}','DashController@adminEdit');
    ///---------------------------------------------ORDERS
    Route::get('orders','DashController@orders');
    ///---------------------------------------------CARDS
    Route::get('cards','DashController@cards');
    Route::get('card/add','CardController@cardAddView');
    Route::post('card/add','CardController@cardAdd');
    Route::get('card/delete/{id}','CardController@cardDelete');
    Route::get('card/edit/{id}','CardController@cardEditView');
    Route::post('card/edit/{id}','CardController@cardEdit');
    ///---------------------------------------------COMPANIES
    Route::get('companies','DashController@companies');
    Route::get('company/add','CompanyController@companyAddView');
    Route::post('company/add','CompanyController@companyAdd');
    Route::get('company/delete/{id}','CompanyController@companyDelete');
    Route::get('company/edit/{id}','CompanyController@companyEditView');
    Route::post('company/edit/{id}','CompanyController@companyEdit');
    ///---------------------------------------------FTTH
    Route::get('ftth','DashController@ftth');
    Route::get('ftth/add','CustomerController@ftthAddView');
    Route::post('ftth/add','CustomerController@ftthAdd');
    Route::get('ftth/delete/{id}','CustomerController@ftthDelete');
    Route::get('ftth/edit/{id}','CustomerController@ftthEditView');
    Route::post('ftth/edit/{id}','CustomerController@ftthEdit');
});