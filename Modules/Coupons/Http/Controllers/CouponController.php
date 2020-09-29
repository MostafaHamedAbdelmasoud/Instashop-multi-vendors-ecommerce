<?php

namespace Modules\Coupons\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Coupons\Entities\Coupon;
use Modules\Accounts\Entities\Customer;
use Modules\Accounts\Entities\StoreOwner;
use Illuminate\Contracts\Foundation\Application;
use Modules\Coupons\Http\Requests\CouponRequest;
use Modules\Coupons\Repositories\CouponRepository;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

/**
 * Class ProductController.
 */
class CouponController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * The repository instance.
     *
     * @var CouponRepository
     */
    private $repository;

    /**
     * Customer Controller constructor.
     *
     * @param CouponRepository $repository
     */
    public function __construct(CouponRepository $repository)
    {
        $this->authorizeResource(Coupon::class, 'coupon');

        $this->repository = $repository;
    }

    /**
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $coupons = $this->repository->all();

        return view('coupons::coupons.index', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('coupons::coupons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Modules\Coupons\Http\Requests\CouponRequest $request
     * @param \Modules\Coupons\Entities\Customer $couponOwner
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CouponRequest $request)
    {
        $coupon = $this->repository->create($request->all());

        flash(trans('coupons::coupons.messages.created'));

        return redirect()->route('dashboard.coupons.show', $coupon);
    }

    /**
     * @param Coupon $coupon
     *
     */
    public function show(Coupon $coupon)
    {
        $coupon = $this->repository->find($coupon);

        return view('coupons::coupons.show', compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Modules\Coupons\Http\Requests\CouponRequest $request
     * @param \Modules\Coupons\Entities\Customer $couponOwner
     * @param \Modules\Coupons\Entities\Store $coupon
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CouponRequest $request, Coupon $coupon)
    {
        $this->repository->update($coupon, $request->all());

        flash(trans('coupons::coupons.messages.updated'));

        return redirect()->route('dashboard.coupons.show', $coupon);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Customer $storeOwner
     * @param Coupon $coupon
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Customer $storeOwner, Coupon $coupon)
    {
        return view('coupons::coupons.edit', compact('storeOwner', 'coupon'));
    }

    /**
     * Remove the specified resource from storage.
     * @param StoreOwner $storeOwner
     * @param Coupon $coupon
     *@throws \Exception
     *@return \Illuminate\Http\RedirectResponse
     */
    public function destroy(StoreOwner $storeOwner, Coupon $coupon)
    {
        $this->repository->delete($coupon);

        flash(trans('coupons::coupons.messages.deleted'));

        return redirect()->route('dashboard.coupons.index');
    }
}
