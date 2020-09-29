<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//
//Route::middleware('auth:api')->get('/stores', function (Request $request) {
//    return $request->user();
//});

Route::get('/select/stores', 'SelectController@index')->name('stores.select');
Route::get('/select/categories', 'SelectController@select_category')->name('categories.select');
Route::get('/select/orders', 'SelectController@select_order')->name('orders.select');
Route::get('/select/custom_field_options', 'SelectController@select_custom_field_option')->name('custom_field_options.select');
