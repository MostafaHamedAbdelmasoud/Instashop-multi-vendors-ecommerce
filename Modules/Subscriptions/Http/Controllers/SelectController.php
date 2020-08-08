<?php

namespace Modules\Subscriptions\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Stores\Entities\Store;
use Modules\Accounts\Entities\ShippingCompany;
use Modules\Subscriptions\Transformers\SelectResource;
use Modules\Subscriptions\Http\Filters\SelectStoreFilter;
use Modules\Subscriptions\Http\Filters\SelectShippingCompanyFilter;
use Modules\Subscriptions\Transformers\SelectShippingCompanyResource;

class SelectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Modules\Subscriptions\Http\Filters\SelectStoreFilter  $filter
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function select_store(SelectStoreFilter $filter)
    {
        $stores = Store::filter($filter)->paginate();

        return SelectResource::collection($stores);
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Modules\Subscriptions\Http\Filters\SelectStoreFilter  $filter
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function select_shipping_company(SelectShippingCompanyFilter $filter)
    {
        $stores = ShippingCompany::filter($filter)->paginate();

        return SelectShippingCompanyResource::collection($stores);
    }
}
