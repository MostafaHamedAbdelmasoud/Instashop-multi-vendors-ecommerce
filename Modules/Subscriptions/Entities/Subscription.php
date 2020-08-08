<?php

namespace Modules\Subscriptions\Entities;

use App\Http\Filters\Filterable;
use Modules\Stores\Entities\Store;
use Modules\Support\Traits\Selectable;
use Illuminate\Database\Eloquent\Model;
use Modules\Accounts\Entities\ShippingCompany;
use Modules\Subscriptions\Entities\Helpers\SubscriptionHelper;

/**
 * Class Category.
 */
class Subscription extends Model
{
    use Filterable, Selectable, SubscriptionHelper;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'model_id',
        'model_type',
        'start_at',
        'end_at',
        'paid_amount',
    ];


    /**
     * specify dates attributes in model.
     * @var string[]
     */
    protected $dates = [
        'start_at',
        'end_at',
    ];

    /**
     * it defines foreign key in relations.
     *
     * @return string
     */
    public function getForeignKey()
    {
        return 'subscription_id';
    }
}
