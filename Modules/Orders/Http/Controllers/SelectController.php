<?php

namespace Modules\Orders\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Stores\Entities\Store;
use Modules\Accounts\Entities\User;
use Modules\Coupons\Entities\Coupon;
use Modules\Accounts\Entities\Address;
use Modules\Accounts\Entities\Customer;
use Modules\Categories\Entities\Category;
use Modules\Accounts\Entities\ShippingCompany;
use Modules\Orders\Transformers\SelectResource;
use Modules\OrderStatuses\Entities\OrderStatus;
use Modules\Orders\Http\Filters\SelectStoreFilter;
use Modules\Orders\Http\Filters\SelectCouponFilter;
use Modules\Orders\Http\Filters\SelectAddressFilter;
use Modules\Orders\Http\Filters\SelectCategoryFilter;
use Modules\Orders\Http\Filters\SelectCustomerFilter;
use Modules\Orders\Transformers\SelectCouponResource;
use Modules\Orders\Transformers\SelectAddressResource;
use Modules\Orders\Transformers\SelectCategoryResource;
use Modules\Orders\Transformers\SelectCustomerResource;
use Modules\Orders\Http\Filters\SelectOrderStatusFilter;
use Modules\OrderStatuses\Http\Filters\OrderStatusFilter;
use Modules\Orders\Transformers\SelectOrderStatusResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Modules\Subscriptions\Http\Filters\SelectShippingCompanyFilter;
use Modules\Subscriptions\Transformers\SelectShippingCompanyResource;

/**
 * Class SelectController.
 */
class SelectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param SelectStoreFilter $filter
     * @return AnonymousResourceCollection
     */
    public function index(SelectStoreFilter $filter)
    {
        $stores = Store::filter($filter)->paginate();

        return SelectResource::collection($stores);
    }

    /**
     * Display a listing of the resource.
     *
     * @param SelectCategoryFilter $filter
     * @return AnonymousResourceCollection
     */
    public function select_category(SelectCategoryFilter $filter)
    {
        $category = Category::filter($filter)->paginate();

        return SelectCategoryResource::collection($category);
    }

    /**
     * Display a listing of the resource.
     *
     * @param SelectStoreFilter $filter
     * @return AnonymousResourceCollection
     */
    public function select_coupon(SelectCouponFilter $filter)
    {
        $coupon = Coupon::filter($filter)->paginate();

        return SelectCouponResource::collection($coupon);
    }

    /**
     * Display a listing of the resource.
     *
     * @param \Modules\Subscriptions\Http\Filters\SelectStoreFilter $filter
     * @return AnonymousResourceCollection
     */
    public function select_shipping_company(SelectShippingCompanyFilter $filter)
    {
        $stores = ShippingCompany::filter($filter)->paginate();

        return SelectShippingCompanyResource::collection($stores);
    }

    /**
     * Display a listing of the resource.
     *
     * @param SelectAddressFilter $filter
     * @param Customer|null $customer
     * @return AnonymousResourceCollection
     */
    public function select_address(SelectAddressFilter $filter, Customer $customer = null)
    {
        if ($customer != null) {
            $addresses = $customer->addresses()->filter($filter)->paginate();

            return SelectAddressResource::collection($addresses);
        }

        $addresses = Address::filter($filter)->paginate();

        return SelectAddressResource::collection($addresses);
    }

    /**
     * Display a listing of the resource.
     *
     * @param SelectAddressFilter $filter
     * @param Customer $customer
     * @return AnonymousResourceCollection
     */
    public function select_customer(SelectCustomerFilter $filter)
    {
        $customers = Customer::filter($filter)->paginate();

        return SelectCustomerResource::collection($customers);
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Modules\Coupons\Http\Filters\SelectStoreFilter  $filter
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function order_status(SelectOrderStatusFilter $filter)
    {
        $orderStatus= OrderStatus::filter($filter)->paginate();

        return SelectOrderStatusResource::collection($orderStatus);
    }
}
