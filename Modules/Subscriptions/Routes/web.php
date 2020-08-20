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
    Route::resource('subscriptions', 'SubscriptionController');
    Route::get('create_shipping_company', 'SubscriptionController@create_shipping_company')->name('create_shipping_company');
    Route::get('edit_shipping_company/{subscription}/edit', 'SubscriptionController@edit_shipping_company')->name('edit_shipping_company');
});
