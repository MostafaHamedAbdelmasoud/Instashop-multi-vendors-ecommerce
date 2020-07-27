<?php

namespace Modules\Stores\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Stores\Entities\Store;
use Modules\Accounts\Entities\StoreOwner;
use Modules\Stores\Http\Requests\StoreRequest;
use Modules\Stores\Repositories\StoreRepository;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

/**
 * Class StoreController.
 */
class StoreController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * The repository instance.
     *
     * @var \Modules\Stores\Repositories\StoreOwnerRepository
     */
    private $repository;

    /**
     * StoreOwnerController constructor.
     *
     * @param \Modules\Stores\Repositories\StoreRepository $repository
     */
    public function __construct(StoreRepository $repository)
    {
        $this->authorizeResource(Store::class, 'store');

        $this->repository = $repository;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $stores = Store::paginate();

        return view('stores::stores.index', compact('stores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stores::stores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Modules\Stores\Http\Requests\StoreRequest $request
     * @param \Modules\Stores\Entities\StoreOwner $storeOwner
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreRequest $request)
    {
        $request->merge(['owner_id' => \Auth::user()->id]);
        $store = $this->repository->create($request->all());

        flash(trans('accounts::stores.messages.created'));

        return redirect()->route('dashboard.stores.show', $store);
    }

    /**
     * @param Store $store
     * @return storeOwner
     */
    public function show(Store $store)
    {
        $store = $this->repository->find($store);

        return view('stores::stores.show', compact('store'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \Modules\Stores\Entities\StoreOwner $storeOwner
     * @param \Modules\Stores\Entities\Store $store
     * @return \Illuminate\Http\Response
     */
    public function edit(StoreOwner $storeOwner, Store $store)
    {
        return view('stores::stores.edit', compact('storeOwner', 'store'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Modules\Stores\Http\Requests\StoreRequest $request
     * @param \Modules\Stores\Entities\StoreOwner $storeOwner
     * @param \Modules\Stores\Entities\Store $store
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Store $store)
    {
        $this->repository->update($store, $request->all());

        flash(trans('accounts::stores.messages.updated'));

        return redirect()->route('dashboard.stores.show', $store);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \Modules\Stores\Entities\StoreOwner $storeOwner
     * @param \Modules\Stores\Entities\Store $store
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(StoreOwner $storeOwner, Store $store)
    {
        $this->repository->delete($store);

        flash(trans('stores::stores.messages.deleted'));

        return redirect()->route('dashboard.stores.index');
    }
}
