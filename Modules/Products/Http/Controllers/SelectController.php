<?php

namespace Modules\Products\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Stores\Entities\Store;
use Modules\Categories\Entities\Category;
use Modules\Products\Transformers\SelectResource;
use Modules\Products\Http\Filters\SelectStoreFilter;
use Modules\Products\Http\Filters\SelectCategoryFilter;
use Modules\Products\Transformers\SelectCategoryResource;

/**
 * Class SelectController.
 */
class SelectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Modules\Products\Http\Filters\SelectStoreFilter  $filter
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
     * @param  \Modules\Products\Http\Filters\SelectStoreFilter  $filter
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function select_category(SelectCategoryFilter $filter)
    {
        $category= Category::filter($filter)->paginate();

        return SelectCategoryResource::collection($category);
    }
}
