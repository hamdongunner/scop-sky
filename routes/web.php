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
    Route::get('orders','DashController@orders');
    Route::get('cards','DashController@cards');
    Route::get('companies','DashController@companies');
    Route::get('ftth','DashController@ftth');
});