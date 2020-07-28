<?php

namespace Modules\Categories\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Stores\Entities\Store;
use Modules\Categories\Transformers\SelectResource;
use Modules\Categories\Http\Filters\SelectStoreFilter;

class SelectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Modules\Categories\Http\Filters\SelectStoreFilter  $filter
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(SelectStoreFilter $filter)
    {
        $stores = Store::filter($filter)->paginate();

        return SelectResource::collection($stores);
    }
}
