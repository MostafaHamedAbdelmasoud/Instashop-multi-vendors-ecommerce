<?php

namespace Modules\Accounts\Http\Controllers\Dashboard;

use Illuminate\Routing\Controller;
use Modules\Accounts\Entities\Store;
use Modules\Accounts\Entities\StoreOwner;
use Modules\Accounts\Http\Requests\StoreRequest;
use Modules\Accounts\Repositories\StoreOwnerRepository;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class StoreController extends Controller
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
        $this->authorizeResource(Store::class, 'store');

        $this->repository = $repository;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Modules\Accounts\Http\Requests\StoreRequest $request
     * @param \Modules\Accounts\Entities\StoreOwner $storeOwner
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreRequest $request, StoreOwner $storeOwner)
    {
        $this->repository->createStore($storeOwner, $request->all());

        flash(trans('accounts::stores.messages.created'));

        return redirect()->route('dashboard.stores.show', $storeOwner);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \Modules\Accounts\Entities\StoreOwner $storeOwner
     * @param \Modules\Accounts\Entities\Store $store
     * @return \Illuminate\Http\Response
     */
    public function edit(StoreOwner $storeOwner, Store $store)
    {
        return view('accounts::stores.edit', compact('storeOwner', 'store'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Modules\Accounts\Http\Requests\StoreRequest $request
     * @param \Modules\Accounts\Entities\StoreOwner $storeOwner
     * @param \Modules\Accounts\Entities\Store $store
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StoreRequest $request, StoreOwner $storeOwner, Store $store)
    {
        $this->repository->updateStore($store, $request->all());

        flash(trans('accounts::stores.messages.updated'));

        return redirect()->route('dashboard.store_owners.show', $storeOwner);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \Modules\Accounts\Entities\StoreOwner $storeOwner
     * @param \Modules\Accounts\Entities\Store $store
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(StoreOwner $storeOwner, Store $store)
    {
        $this->repository->deleteStore($store);

        flash(trans('accounts::addresses.messages.deleted'));

        return redirect()->route('dashboard.customers.show', $storeOwner);
    }
}
