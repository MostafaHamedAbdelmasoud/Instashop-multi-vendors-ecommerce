<?php

namespace Modules\Coupons\Entities;

use App\Http\Filters\Filterable;
use Modules\Orders\Entities\Order;
use Modules\Support\Traits\Selectable;
use Illuminate\Database\Eloquent\Model;
use Modules\Coupons\Entities\Helpers\CouponHelper;

/**
 * Class Category.
 */
class Coupon extends Model
{
    use  Filterable, Selectable, CouponHelper;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'code',
        'percentage_discount',
        'fixed_discount',
        'percentage_discount',
        'max_usage_per_order',
        'max_usage_per_user',
        'min_total',
    ];

    /**
     * it defines foreign key in relations.
     *
     * @return string
     */
    public function getForeignKey()
    {
        return 'coupon_id';
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
