<?php

namespace Modules\Offers\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Offers\Entities\Offer;
use Modules\Stores\Entities\Store;
use Modules\Categories\Entities\Category;
use Modules\Offers\Entities\Helpers\Topic;
use phpDocumentor\Reflection\Types\Collection;
use Modules\Offers\Transformers\SelectResource;
use Modules\Offers\Http\Filters\SelectStoreFilter;
use Modules\Offers\Http\Filters\SelectCategoryFilter;
use Modules\Offers\Http\Filters\SelectModelTypeFilter;
use Modules\Offers\Transformers\SelectCategoryResource;
use Modules\Offers\Transformers\SelectModelTypeResource;

/**
 * Class SelectController.
 */
class SelectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \Modules\Offers\Http\Filters\SelectStoreFilter $filter
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
     * @param \Modules\Offers\Http\Filters\SelectStoreFilter $filter
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function select_category(SelectCategoryFilter $filter)
    {
        $category = Category::filter($filter)->paginate();

        return SelectCategoryResource::collection($category);
    }

    /**
     * Display a listing of the resource.
     *
     * @param \Modules\Offers\Http\Filters\SelectStoreFilter $filter
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function select_model_type(SelectModelTypeFilter $filter)
    {
        $category = Offer::filter($filter)->paginate();

        return SelectModelTypeResource::collection($category);
    }
}
