<?php

namespace Modules\Products\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Products\Entities\Product;
use Modules\Accounts\Entities\StoreOwner;
use Illuminate\Contracts\Foundation\Application;
use Modules\Products\Http\Requests\ProductRequest;
use Modules\Products\Repositories\ProductRepository;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

/**
 * Class ProductController.
 */
class ProductController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * The repository instance.
     *
     * @var ProductRepository
     */
    private $repository;

    /**
     * StoreOwnerController constructor.
     *
     * @param ProductRepository $repository
     */
    public function __construct(ProductRepository $repository)
    {
        $this->authorizeResource(Product::class, 'product');

        $this->repository = $repository;
    }

    /**
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $products = $this->repository->all();

        return view('products::products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('products::products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Modules\Products\Http\Requests\ProductRequest $request
     * @param \Modules\Products\Entities\StoreOwner $productOwner
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProductRequest $request)
    {
        $product = $this->repository->create($request->all());

        flash(trans('products::products.messages.created'));

        return redirect()->route('dashboard.products.show', $product);
    }

    /**
     * @param Product $product
     *
     */
    public function show(Product $product)
    {
        $product = $this->repository->find($product);

        return view('products::products.show', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Modules\Products\Http\Requests\ProductRequest $request
     * @param \Modules\Products\Entities\StoreOwner $productOwner
     * @param \Modules\Products\Entities\Store $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Product $product)
    {
        $this->repository->update($product, $request->all());

        flash(trans('products::products.messages.updated'));

        return redirect()->route('dashboard.products.show', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param StoreOwner $storeOwner
     * @param Product $product
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(StoreOwner $storeOwner, Product $product)
    {
        return view('products::products.edit', compact('storeOwner', 'product'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \Modules\Products\Entities\StoreOwner $storeOwner
     * @param \Modules\Products\Entities\Store $product
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(StoreOwner $storeOwner, Product $product)
    {
        $this->repository->delete($product);

        flash(trans('products::products.messages.deleted'));

        return redirect()->route('dashboard.products.index');
    }
}
