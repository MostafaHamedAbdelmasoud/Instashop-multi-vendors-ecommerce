<?php

namespace Modules\OrderStatuses\Entities;

use App\Http\Filters\Filterable;
use Modules\Accounts\Entities\User;
use Modules\Coupons\Entities\Coupon;
use Modules\Accounts\Entities\Address;
use Modules\Support\Traits\Selectable;
use Illuminate\Database\Eloquent\Model;
use Modules\Accounts\Entities\ShippingCompany;
use Modules\OrderStatuses\Entities\Helpers\OrderStatusHelper;

/**
 * Class Category.
 */
class OrderStatusTranslation extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'name',
        'locale',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
