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

Route::get('/', 'HomeController@index');


Route::get('wireless','HomeController@getWirelessView');

Route::get('ftth','HomeController@getFtthView')->middleware('customer');

Route::get('login','HomeController@loginView');

Route::post('login','HomeController@login');

Route::get('dashboard','DashController@index')->middleware('admin');;

Route::get('dashboard/orders','DashController@orders');

Route::get('dashboard/cards','DashController@cards');

Route::get('dashboard/companies','DashController@companies');

Route::get('dashboard/ftth','DashController@ftth');


Route::get('order','OrderController@get');
