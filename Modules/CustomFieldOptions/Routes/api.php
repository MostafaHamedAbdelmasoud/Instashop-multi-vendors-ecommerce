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

Route::get('/select/products', 'SelectController@select_product')->name('products.select');
Route::get('/select/custom_fields', 'SelectController@select_custom_field')->name('custom_fields.select');
