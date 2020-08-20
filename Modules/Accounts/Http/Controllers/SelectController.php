<?php

namespace Modules\Accounts\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Accounts\Entities\User;
use Modules\Accounts\Http\Filters\SelectFilter;
use Modules\Accounts\Transformers\SelectResource;
use Modules\Accounts\Transformers\SelectCitiesResource;

class SelectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \Modules\Accounts\Http\Filters\SelectFilter $filter
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(SelectFilter $filter)
    {
        $users = User::filter($filter)->paginate();

        return SelectResource::collection($users);
    }
}
