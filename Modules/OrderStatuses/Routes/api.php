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

Route::get('/select/coupons', 'SelectController@select_coupon')->name('coupons.select');
Route::get('/select/customers', 'SelectController@select_customer')->name('customers.select');
Route::get('/select/addresses/{customer?}', 'SelectController@select_address')->name('addresses.select');
