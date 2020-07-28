<?php

namespace Modules\CustomFields\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\CustomFields\Entities\CustomField;
use Modules\Accounts\Entities\StoreOwner;
use Modules\CustomFields\Http\Requests\CustomFieldRequest;
use Modules\CustomFields\Repositories\CustomFieldRepository;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

/**
 * Class ProductController.
 */
class CustomFieldController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * The repository instance.
     *
     * @var \Modules\CustomFields\Repositories\CustomFieldRepository
     */
    private $repository;

    /**
     * StoreOwnerController constructor.
     *
     * @param \Modules\CustomFields\Repositories\CustomFieldRepository $repository
     */
    public function __construct(CustomFieldRepository $repository)
    {
        $this->authorizeResource(CustomField::class, 'product');

        $this->repository = $repository;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $products = CustomField::paginate();

        return view('products::products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products::products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Modules\CustomFields\Http\Requests\CustomFieldRequest $request
     * @param \Modules\CustomFields\Entities\StoreOwner $productOwner
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CustomFieldRequest $request)
    {
        $request->merge(['owner_id' => \Auth::user()->id]);
        $product = $this->repository->create($request->all());

        flash(trans('products::products.messages.created'));

        return redirect()->route('dashboard.products.show', $product);
    }

    /**
     * @param CustomField $product
     *
     */
    public function show(CustomField $product)
    {
        $product = $this->repository->find($product);

        return view('products::products.show', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Modules\CustomFields\Http\Requests\CustomFieldRequest $request
     * @param \Modules\CustomFields\Entities\StoreOwner $productOwner
     * @param \Modules\CustomFields\Entities\Store $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, CustomField $product)
    {
        $this->repository->update($product, $request->all());

        flash(trans('products::products.messages.updated'));

        return redirect()->route('dashboard.products.show', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param StoreOwner $storeOwner
     * @param CustomField $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(StoreOwner $storeOwner, CustomField $product)
    {
        return view('products::products.edit', compact('storeOwner', 'product'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \Modules\CustomFields\Entities\StoreOwner $storeOwner
     * @param \Modules\CustomFields\Entities\Store $product
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(StoreOwner $storeOwner, CustomField $product)
    {
        $this->repository->delete($product);

        flash(trans('products::products.messages.deleted'));

        return redirect()->route('dashboard.products.index');
    }
}
