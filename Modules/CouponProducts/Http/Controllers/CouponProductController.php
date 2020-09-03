<?php

namespace Modules\CouponProducts\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\View\Factory;
use Modules\Accounts\Entities\Customer;
use Modules\Accounts\Entities\StoreOwner;
use Illuminate\Contracts\Foundation\Application;
use Modules\CouponProducts\Entities\CouponProduct;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Modules\CouponProducts\Http\Requests\CouponProductRequest;
use Modules\CouponProducts\Repositories\CouponProductRepository;

/**
 * Class ProductController.
 */
class CouponProductController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * The repository instance.
     *
     * @var CouponProductRepository
     */
    private $repository;

    /**
     * Customer Controller constructor.
     *
     * @param CouponProductRepository $repository
     */
    public function __construct(CouponProductRepository $repository)
    {
        $this->authorizeResource(CouponProduct::class, 'coupon_product');

        $this->repository = $repository;
    }

    /**
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $couponProducts = $this->repository->all();
//        dd($couponProducts);
        return view('coupon_products::coupon_products.index', compact('couponProducts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('coupon_products::coupon_products.create');
    }

    /**
     * Show the form for creating a new shipping company.
     *
     * @return Application|Factory|\Illuminate\Http\Response|View
     */
    public function create_coupon_category()
    {
        return view('coupon_products::coupon_products.coupon_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Modules\CouponProducts\Http\Requests\CouponProductRequest $request
     * @param \Modules\CouponProducts\Entities\Customer $couponProductOwner
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CouponProductRequest $request)
    {
        $couponProduct = $this->repository->create($request->all());

        flash(trans('coupon_products::coupon_products.messages.created'));

        return redirect()->route('dashboard.coupon_products.show', $couponProduct);
    }

    /**
     * @param CouponProduct $couponProduct
     *
     */
    public function show(CouponProduct $couponProduct)
    {
        $couponProduct = $this->repository->find($couponProduct);

        return view('coupon_products::coupon_products.show', compact('couponProduct'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Modules\CouponProducts\Http\Requests\CouponProductRequest $request
     * @param \Modules\CouponProducts\Entities\Customer $couponProductOwner
     * @param \Modules\CouponProducts\Entities\Store $couponProduct
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CouponProductRequest $request, CouponProduct $couponProduct)
    {
        $this->repository->update($couponProduct, $request->all());

        flash(trans('coupon_products::coupon_products.messages.updated'));

        return redirect()->route('dashboard.coupon_products.show', $couponProduct);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Customer $storeOwner
     * @param CouponProduct $couponProduct
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Customer $storeOwner, CouponProduct $couponProduct)
    {
        return view('coupon_products::coupon_products.edit', compact('storeOwner', 'couponProduct'));
    }

    /**
     * Show the form for edit a new coupon category.
     *
     * @return Application|Factory|\Illuminate\Http\Response|View
     */
    public function edit_coupon_category()
    {
        return view('coupon_products::coupon_products.coupon_categories.edit');
    }

    /**
     * Remove the specified resource from storage.
     * @param StoreOwner $storeOwner
     * @param CouponProduct $couponProduct
     *@throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(StoreOwner $storeOwner, CouponProduct $couponProduct)
    {
        $this->repository->delete($couponProduct);

        flash(trans('coupon_products::coupon_products.messages.deleted'));

        return redirect()->route('dashboard.coupon_products.index');
    }
}
