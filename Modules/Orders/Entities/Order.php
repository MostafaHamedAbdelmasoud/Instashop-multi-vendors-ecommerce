<?php

namespace Modules\Orders\Entities;

use App\Http\Filters\Filterable;
use Modules\Accounts\Entities\User;
use Modules\Coupons\Entities\Coupon;
use Modules\Accounts\Entities\Address;
use Modules\Support\Traits\Selectable;
use Illuminate\Database\Eloquent\Model;
use Modules\Accounts\Entities\ShippingCompany;
use Modules\Orders\Entities\Helpers\OrderHelper;

/**
 * Class Category.
 */
class Order extends Model
{
    use Filterable, Selectable, OrderHelper;

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = [
        'user',
        'address',
        'shipping_company',
        'coupon',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'user_id',
        'coupon_id',
        'address_id',
        'shipping_company_id',
        'shipping_company_notes',
        'subtotal',
        'total',
        'discount',
    ];

    /**
     * it defines foreign key in relations.
     *
     * @return string
     */
    public function getForeignKey()
    {
        return 'order_id';
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function shipping_company()
    {
        return $this->belongsTo(ShippingCompany::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderStatusUpdates()
    {
        return $this->hasMany(OrderStatusUpdate::class);
    }
}
