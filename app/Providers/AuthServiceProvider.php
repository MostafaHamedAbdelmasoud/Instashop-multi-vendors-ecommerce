<?php

namespace App\Providers;

use Modules\Offers\Entities\Offer;
use Modules\Orders\Entities\Order;
use Modules\Stores\Entities\Store;
use Modules\Accounts\Entities\User;
use Modules\Accounts\Entities\Admin;
use Modules\Countries\Entities\City;
use Modules\Coupons\Entities\Coupon;
use Modules\Accounts\Entities\Address;
use Modules\Products\Entities\Product;
use Modules\Accounts\Entities\Delegate;
use Modules\Countries\Entities\Country;
use Modules\Offers\Policies\OfferPolicy;
use Modules\Orders\Policies\OrderPolicy;
use Modules\Stores\Policies\StorePolicy;
use Modules\Accounts\Entities\StoreOwner;
use Modules\Accounts\Entities\Supervisor;
use Modules\Accounts\Policies\UserPolicy;
use Modules\Categories\Entities\Category;
use Modules\Countries\Policies\CityPolicy;
use Modules\Coupons\Policies\CouponPolicy;
use Modules\Accounts\Policies\AddressPolicy;
use Modules\Products\Policies\ProductPolicy;
use Modules\Accounts\Policies\DelegatePolicy;
use Modules\Countries\Policies\CountryPolicy;
use Modules\Accounts\Entities\ShippingCompany;
use Modules\CustomFields\Entities\CustomField;
use Modules\Orders\Entities\OrderStatusUpdate;
use Modules\Accounts\Policies\StoreOwnerPolicy;
use Modules\Accounts\Policies\SupervisorPolicy;
use Modules\Categories\Policies\CategoryPolicy;
use Modules\OrderStatuses\Entities\OrderStatus;
use Modules\OrderProducts\Entities\OrderProduct;
use Modules\Subscriptions\Entities\Subscription;
use Modules\CouponProducts\Entities\CouponProduct;
use Modules\Accounts\Entities\ShippingCompanyOwner;
use Modules\Accounts\Policies\ShippingCompanyPolicy;
use Modules\CustomFields\Policies\CustomFieldPolicy;
use Modules\Orders\Policies\OrderStatusUpdatePolicy;
use Modules\OrderStatuses\Policies\OrderStatusPolicy;
use Modules\OrderProducts\Policies\OrderProductPolicy;
use Modules\Subscriptions\Policies\SubscriptionPolicy;
use Modules\CouponProducts\Policies\CouponProductPolicy;
use Modules\Accounts\Policies\ShippingCompanyOwnerPolicy;
use Modules\CustomFieldOptions\Entities\CustomFieldOption;
use Modules\OrderProducts\Entities\OrderProductFieldValue;
use Modules\CustomFieldOptions\Policies\CustomFieldOptionPolicy;
use Modules\OrderProducts\Policies\OrderProductFieldValuePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Modules\TemplateBanners\Entities\TemplateBanner;
use Modules\TemplateBanners\Policies\TemplateBannerPolicy;

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
        OrderProduct::class => OrderProductPolicy::class,
        CustomField::class => CustomFieldPolicy::class,
        CustomFieldOption::class => CustomFieldOptionPolicy::class,
        Subscription::class => SubscriptionPolicy::class,
        Order::class => OrderPolicy::class,
        CouponProduct::class => CouponProductPolicy::class,
        Coupon::class => CouponPolicy::class,
        OrderStatus::class => OrderStatusPolicy::class,
        OrderStatusUpdate::class => OrderStatusUpdatePolicy::class,
        OrderProductFieldValue::class => OrderProductFieldValuePolicy::class,
        Offer::class => OfferPolicy::class,
        TemplateBanner::class => TemplateBannerPolicy::class,
    ];
}
