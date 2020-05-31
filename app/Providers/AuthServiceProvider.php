<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        \Modules\Accounts\Entities\User::class => \Modules\Accounts\Policies\UserPolicy::class,
        \Modules\Accounts\Entities\Admin::class => \Modules\Accounts\Policies\UserPolicy::class,
        \Modules\Accounts\Entities\StoreOwner::class => \Modules\Accounts\Policies\StoreOwnerPolicy::class,
        \Modules\Accounts\Entities\Supervisor::class => \Modules\Accounts\Policies\SupervisorPolicy::class,
        \Modules\Accounts\Entities\ShippingCompanyOwner::class => \Modules\Accounts\Policies\ShippingCompanyOwnerPolicy::class,
        \Modules\Accounts\Entities\Delegate::class => \Modules\Accounts\Policies\DelegatePolicy::class,
        \Modules\Countries\Entities\Country::class => \Modules\Countries\Policies\CountryPolicy::class,
        \Modules\Countries\Entities\City::class => \Modules\Countries\Policies\CityPolicy::class,
        \Modules\Accounts\Entities\Address::class => \Modules\Accounts\Policies\AddressPolicy::class,
        \Modules\Accounts\Entities\ShippingCompany::class => \Modules\Accounts\Policies\ShippingCompanyPolicy::class,
        \Modules\Accounts\Entities\Store::class => \Modules\Accounts\Policies\StorePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}
