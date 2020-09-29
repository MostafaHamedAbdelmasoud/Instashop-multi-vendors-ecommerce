<?php

namespace Modules\Offers\Entities;

use App\Http\Filters\Filterable;
use Modules\Orders\Entities\Order;
use Modules\Support\Traits\Selectable;
use Illuminate\Database\Eloquent\Model;
use Modules\Offers\Entities\Helpers\OfferHelper;

/**
 * Class Category.
 */
class OfferTranslation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'name',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
