<?php

namespace Modules\Accounts\Http\Controllers\Dashboard;

use Illuminate\Routing\Controller;
use Modules\Accounts\Entities\StoreOwner;
use Modules\Accounts\Http\Requests\StoreOwnerRequest;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Modules\Accounts\Repositories\StoreOwnerRepository;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class StoreOwnerController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;
    /**
     * The repository instance.
     *
     * @var \Modules\Accounts\Repositories\StoreOwnerRepository
     */
    private $repository;

    /**
     * StoreOwnerController constructor.
     *
     * @param \Modules\Accounts\Repositories\StoreOwnerRepository $repository
     */
    public function __construct(StoreOwnerRepository $repository)
    {
        $this->authorizeResource(StoreOwner::class, 'store_owner');

        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $storeOwners = $this->repository->all();

        return view('accounts::store_owners.index', compact('storeOwners'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('accounts::store_owners.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(StoreOwnerRequest $request)
    {
        $storeOwner = $this->repository->create($request->allWithHashedPassword());

        flash(trans('accounts::store_owners.messages.created'));

        return redirect()->route('dashboard.store_owners.show', $storeOwner);
    }

    /**
     * Show the specified resource.
     * @param \Modules\Accounts\Entities\StoreOwner $storeOwner
     * @return \Illuminate\Http\Response
     * @return Response
     */
    public function show(StoreOwner $storeOwner)
    {
        $storeOwner = $this->repository->find($storeOwner);

        $stores = $storeOwner->stores()->paginate();
//        dd($stores);
        return view('accounts::store_owners.show', compact('storeOwner', 'stores'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param \Modules\Accounts\Entities\StoreOwner $storeOwner
     * @return Response
     */
    public function edit(StoreOwner $storeOwner)
    {
        $storeOwner = $this->repository->find($storeOwner);

        return view('accounts::store_owners.edit', compact('storeOwner'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(StoreOwnerRequest $request, StoreOwner $storeOwner)
    {
        $storeOwner = $this->repository->update($storeOwner, $request->allWithHashedPassword());

        flash(trans('accounts::store_owners.messages.updated'));

        return redirect()->route('dashboard.store_owners.show', $storeOwner);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy(StoreOwner $storeOwner)
    {
        //
        $this->repository->delete($storeOwner);

        flash(trans('accounts::store_owners.messages.deleted'));

        return redirect()->route('dashboard.store_owners.index');
    }
}
