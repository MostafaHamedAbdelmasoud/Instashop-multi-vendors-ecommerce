<?php

namespace Modules\OrderStatuses\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Stores\Entities\Store;
use Modules\Accounts\Entities\User;
use Modules\Coupons\Entities\Coupon;
use Modules\Accounts\Entities\Address;
use Modules\Accounts\Entities\Customer;
use Modules\Categories\Entities\Category;
use Modules\Accounts\Entities\ShippingCompany;
use Modules\OrderStatuses\Transformers\SelectResource;
use Modules\OrderStatuses\Http\Filters\SelectStoreFilter;
use Modules\OrderStatuses\Http\Filters\SelectCouponFilter;
use Modules\OrderStatuses\Http\Filters\SelectAddressFilter;
use Modules\OrderStatuses\Http\Filters\SelectCategoryFilter;
use Modules\OrderStatuses\Http\Filters\SelectCustomerFilter;
use Modules\OrderStatuses\Transformers\SelectCouponResource;
use Modules\OrderStatuses\Transformers\SelectAddressResource;
use Modules\OrderStatuses\Transformers\SelectCategoryResource;
use Modules\OrderStatuses\Transformers\SelectCustomerResource;
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
}
