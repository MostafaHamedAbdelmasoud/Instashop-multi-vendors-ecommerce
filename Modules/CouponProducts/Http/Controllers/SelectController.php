<?php

namespace Modules\CouponProducts\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Coupons\Entities\Coupon;
use Modules\Products\Entities\Product;
use Modules\Categories\Entities\Category;
use Modules\CouponProducts\Transformers\SelectResource;
use Modules\CouponProducts\Http\Filters\SelectStoreFilter;
use Modules\CouponProducts\Http\Filters\SelectCouponFilter;
use Modules\CouponProducts\Http\Filters\SelectProductFilter;
use Modules\CouponProducts\Http\Filters\SelectCategoryFilter;
use Modules\CouponProducts\Transformers\SelectCouponResource;
use Modules\CouponProducts\Transformers\SelectProductResource;
use Modules\CouponProducts\Transformers\SelectCategoryResource;

/**
 * Class SelectController.
 */
class SelectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Modules\CouponProducts\Http\Filters\SelectStoreFilter  $filter
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(SelectStoreFilter $filter)
    {
        $stores = Store::filter($filter)->paginate();

        return SelectResource::collection($stores);
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Modules\CouponProducts\Http\Filters\SelectStoreFilter  $filter
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function select_category(SelectCategoryFilter $filter)
    {
        $category= Category::filter($filter)->paginate();

        return SelectCategoryResource::collection($category);
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Modules\CouponProducts\Http\Filters\SelectStoreFilter  $filter
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function select_product(SelectProductFilter $filter)
    {
        $product= Product::filter($filter)->paginate();

        return SelectProductResource::collection($product);
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Modules\CouponProducts\Http\Filters\SelectStoreFilter  $filter
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function select_coupon(SelectCouponFilter $filter)
    {
        $coupon= Coupon::filter($filter)->paginate();

        return SelectCouponResource::collection($coupon);
    }
}
