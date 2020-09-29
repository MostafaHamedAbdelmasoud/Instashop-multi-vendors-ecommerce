<?php

namespace Modules\Offers\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Stores\Entities\Store;
use Modules\Categories\Entities\Category;
use Modules\Offers\Transformers\SelectResource;
use Modules\Offers\Http\Filters\SelectStoreFilter;
use Modules\Offers\Http\Filters\SelectCategoryFilter;
use Modules\Offers\Transformers\SelectCategoryResource;

/**
 * Class SelectController.
 */
class SelectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Modules\Offers\Http\Filters\SelectStoreFilter  $filter
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
     * @param  \Modules\Offers\Http\Filters\SelectStoreFilter  $filter
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function select_category(SelectCategoryFilter $filter)
    {
        $category= Category::filter($filter)->paginate();

        return SelectCategoryResource::collection($category);
    }
}
