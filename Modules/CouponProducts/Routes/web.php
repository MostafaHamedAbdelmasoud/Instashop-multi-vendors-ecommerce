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

Route::middleware('dashboard')->prefix('dashboard')->as('dashboard.')->group(function () {
    Route::resource('coupon_products', 'CouponProductController');
    Route::get('coupon_categories', 'CouponProductController@create_coupon_category')->name('create_coupon_category');
    Route::get('coupon_categories/{coupon_product}/edit', 'CouponProductController@edit_coupon_category')->name('edit_coupon_category');
});
