<?php

namespace Modules\Countries\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Countries\Entities\City;
use Modules\Countries\Entities\Country;
use Modules\Countries\Http\Filters\SelectFilter;
use Modules\Countries\Transformers\SelectResource;
use Modules\Countries\Transformers\SelectCityResource;
use Modules\Countries\Transformers\SelectTypeResource;

class SelectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Modules\Countries\Http\Filters\SelectFilter  $filter
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(SelectFilter $filter)
    {
        $countries = Country::filter($filter)->paginate();

        return SelectResource::collection($countries);
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Modules\Countries\Http\Filters\SelectFilter  $filter
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function cities(SelectFilter $filter)
    {
        $cities = City::filter($filter)->paginate();

        return SelectCityResource::collection($cities);
    }
}
