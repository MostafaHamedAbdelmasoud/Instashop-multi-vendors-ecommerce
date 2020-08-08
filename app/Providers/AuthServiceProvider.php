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
use Modules\Stores\Policies\StorePolicy;
use Modules\Accounts\Entities\StoreOwner;
use Modules\Accounts\Entities\Supervisor;
use Modules\Accounts\Policies\UserPolicy;
use Modules\Categories\Entities\Category;
use Modules\Countries\Policies\CityPolicy;
use Modules\Accounts\Policies\AddressPolicy;
use Modules\Products\Policies\ProductPolicy;
use Modules\Accounts\Policies\DelegatePolicy;
use Modules\Countries\Policies\CountryPolicy;
use Modules\Accounts\Entities\ShippingCompany;
use Modules\CustomFields\Entities\CustomField;
use Modules\Accounts\Policies\StoreOwnerPolicy;
use Modules\Accounts\Policies\SupervisorPolicy;
use Modules\Categories\Policies\CategoryPolicy;
use Modules\Subscriptions\Entities\Subscription;
use Modules\Accounts\Entities\ShippingCompanyOwner;
use Modules\Accounts\Policies\ShippingCompanyPolicy;
use Modules\CustomFields\Policies\CustomFieldPolicy;
use Modules\Subscriptions\Policies\SubscriptionPolicy;
use Modules\Accounts\Policies\ShippingCompanyOwnerPolicy;
use Modules\CustomFieldOptions\Entities\CustomFieldOption;
use Modules\CustomFieldOptions\Policies\CustomFieldOptionPolicy;
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
        User::class => UserPolicy::class,
        Admin::class => UserPolicy::class,
        StoreOwner::class => StoreOwnerPolicy::class,
        Supervisor::class => SupervisorPolicy::class,
        ShippingCompanyOwner::class => ShippingCompanyOwnerPolicy::class,
        Delegate::class => DelegatePolicy::class,
        Country::class => CountryPolicy::class,
        City::class => CityPolicy::class,
        Address::class => AddressPolicy::class,
        ShippingCompany::class => ShippingCompanyPolicy::class,
        Store::class => StorePolicy::class,
        Category::class => CategoryPolicy::class,
        Product::class => ProductPolicy::class,
        CustomField::class => CustomFieldPolicy::class,
        CustomFieldOption::class => CustomFieldOptionPolicy::class,
        Subscription::class => SubscriptionPolicy::class,
    ];
}
