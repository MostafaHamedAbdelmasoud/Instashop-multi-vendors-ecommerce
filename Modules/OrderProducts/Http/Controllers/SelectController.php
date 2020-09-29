<?php

namespace Modules\OrderProducts\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Orders\Entities\Order;
use Modules\Stores\Entities\Store;
use Modules\Categories\Entities\Category;
use Modules\OrderProducts\Transformers\SelectResource;
use Modules\OrderProducts\Http\Filters\SelectOrderFilter;
use Modules\OrderProducts\Http\Filters\SelectStoreFilter;
use Modules\CustomFieldOptions\Entities\CustomFieldOption;
use Modules\OrderProducts\Transformers\SelectOrderResource;
use Modules\OrderProducts\Http\Filters\SelectCategoryFilter;
use Modules\OrderProducts\Transformers\SelectCategoryResource;
use Modules\OrderProducts\Http\Filters\SelectCustomFieldOptionFilter;
use Modules\OrderProducts\Transformers\SelectCustomFieldOptionResource;

/**
 * Class SelectController.
 */
class SelectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Modules\OrderProducts\Http\Filters\SelectStoreFilter  $filter
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(SelectStoreFilter $filter)
    {
        $stores = Store::filter($filter)->paginate();

        return SelectResource::collection($stores);
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Modules\OrderProducts\Http\Filters\SelectStoreFilter  $filter
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function select_category(SelectCategoryFilter $filter)
    {
        $category= Category::filter($filter)->paginate();

        return SelectCategoryResource::collection($category);
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Modules\OrderProducts\Http\Filters\SelectStoreFilter  $filter
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function select_order(SelectOrderFilter $filter)
    {
        $order= OrderStatus::filter($filter)->paginate();

        return SelectOrderResource::collection($order);
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Modules\OrderProducts\Http\Filters\SelectStoreFilter  $filter
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function select_custom_field_option(SelectCustomFieldOptionFilter $filter)
    {
        $customFieldOption= CustomFieldOption::filter($filter)->paginate();

        return SelectCustomFieldOptionResource::collection($customFieldOption);
    }
}
