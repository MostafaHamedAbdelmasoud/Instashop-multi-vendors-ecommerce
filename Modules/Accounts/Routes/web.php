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

Route::middleware('dashboard')
    ->prefix('dashboard')
    ->as('dashboard.')
    ->group(
        function () {
            Route::prefix('accounts')
                ->group(
                    function () {
                        Route::resource('customers', 'Dashboard\CustomerController');
                        Route::resource('admins', 'Dashboard\AdminController');
                        Route::resource('store_owners', 'Dashboard\StoreOwnerController');
                        Route::resource('store_owners.stores', 'Dashboard\StoreOwnerController');
                        Route::resource('supervisors', 'Dashboard\SupervisorController');
                        Route::resource('shipping_company_owners', 'Dashboard\ShippingCompanyOwnerController');
                        Route::resource('delegates', 'Dashboard\DelegateController');
                        Route::resource('customers.addresses', 'Dashboard\AddressController');
                        Route::resource('shipping_company_owners.shipping_companies', 'Dashboard\ShippingCompanyController');
                    }
                );
        }
    );
