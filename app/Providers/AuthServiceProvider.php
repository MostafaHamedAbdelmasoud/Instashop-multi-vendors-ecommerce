<?php

namespace App\Providers;

use Modules\Stores\Entities\Store;
use Modules\Accounts\Entities\User;
use Modules\Accounts\Entities\Admin;
use Modules\Countries\Entities\City;
use Modules\Accounts\Entities\Address;
use Modules\Products\Entities\Product;
use Modules\Accounts\Entities\Delegate;
use Modules\Countries\Entities\Country;
use Modules\Accounts\Entities\StoreOwner;
use Modules\Accounts\Entities\Supervisor;
use Modules\Categories\Entities\Category;
use Modules\Accounts\Entities\ShippingCompany;
use Modules\CustomFields\Entities\CustomField;
use Modules\Accounts\Entities\ShippingCompanyOwner;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }

    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        User::class => \Modules\Accounts\Policies\UserPolicy::class,
        Admin::class => \Modules\Accounts\Policies\UserPolicy::class,
        StoreOwner::class => \Modules\Accounts\Policies\StoreOwnerPolicy::class,
        Supervisor::class => \Modules\Accounts\Policies\SupervisorPolicy::class,
        ShippingCompanyOwner::class => \Modules\Accounts\Policies\ShippingCompanyOwnerPolicy::class,
        Delegate::class => \Modules\Accounts\Policies\DelegatePolicy::class,
        Country::class => \Modules\Countries\Policies\CountryPolicy::class,
        City::class => \Modules\Countries\Policies\CityPolicy::class,
        Address::class => \Modules\Accounts\Policies\AddressPolicy::class,
        ShippingCompany::class => \Modules\Accounts\Policies\ShippingCompanyPolicy::class,
        Store::class => \Modules\Stores\Policies\StorePolicy::class,
        Category::class => \Modules\Categories\Policies\CategoryPolicy::class,
        Product::class => \Modules\Products\Policies\ProductPolicy::class,
        CustomField::class => \Modules\CustomFields\Policies\CustomFieldPolicy::class,
    ];
}
