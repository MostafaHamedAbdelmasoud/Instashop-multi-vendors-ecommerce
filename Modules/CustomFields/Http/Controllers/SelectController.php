<?php

namespace Modules\CustomFields\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Categories\Entities\Category;
use Modules\CustomFields\Http\Filters\SelectCategoryFilter;
use Modules\CustomFields\Transformers\SelectCategoryResource;
use Modules\Stores\Entities\Store;
use Modules\CustomFields\Transformers\SelectResource;
use Modules\CustomFields\Http\Filters\SelectStoreFilter;

/**
 * Class SelectController
 * @package Modules\CustomFields\Http\Controllers
 */
class SelectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Modules\CustomFields\Http\Filters\SelectStoreFilter  $filter
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
     * @param  \Modules\CustomFields\Http\Filters\SelectStoreFilter  $filter
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function select_category(SelectCategoryFilter $filter)
    {
        $category= Category::filter($filter)->paginate();

        return SelectCategoryResource::collection($category);
    }
}
