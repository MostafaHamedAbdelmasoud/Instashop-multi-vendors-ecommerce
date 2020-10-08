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
    Route::resource('offers', 'OfferController', ['except'=>['create', 'store']]);
    Route::get('/create_product_offer', 'OfferController@create_product_offer')->name('offers.create_product_offer');
    Route::post('/create_product_offer/{type}', 'OfferController@store')->name('store.create_product_offer');
    Route::get('/create_category_offer', 'OfferController@create_category_offer')->name('offers.create_category_offer');
    Route::post('/create_category_offer/{type}', 'OfferController@store')->name('store.create_category_offer');
    Route::get('/create_store_offer', 'OfferController@create_store_offer')->name('offers.create_store_offer');
    Route::post('/create_store_offer/{type}', 'OfferController@store')->name('store.create_store_offer');
});
