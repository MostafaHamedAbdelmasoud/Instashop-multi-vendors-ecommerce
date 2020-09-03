<?php

namespace Modules\CouponProducts\Entities;

use App\Http\Filters\Filterable;
use Modules\Coupons\Entities\Coupon;
use Modules\Products\Entities\Product;
use Modules\Support\Traits\Selectable;
use Illuminate\Database\Eloquent\Model;
use Modules\Categories\Entities\Category;
use Modules\CouponProducts\Entities\Helpers\CouponProductHelper;

/**
 * Class Category.
 */
class CouponProduct extends Model
{
    use  Filterable, Selectable, CouponProductHelper;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'model_id',
        'model_type',
        'type',
        'coupon_id',
    ];


    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    public $with = [
        'product',
        'category',
    ];

    /**
     * it defines foreign key in relations.
     *
     * @return string
     */
    public function getForeignKey()
    {
        return 'coupon_product_id';
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'model_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'model_id', 'id');
    }
}
