<?php

namespace Modules\Offers\Entities;

use App\Http\Filters\Filterable;
use Modules\Orders\Entities\Order;
use Modules\Support\Traits\Selectable;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Modules\Offers\Entities\Helpers\OfferHelper;

/**
 * Class Category.
 */
class Offer extends Model
{
    use  Filterable, Selectable, Translatable, OfferHelper;

    /**
     * The translated attributes that are mass assignable.
     *
     * @var array
     */
    public $translatedAttributes = ['name'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'fixed_discount_price',
        'percentage_discount_price',
        'model_type',
        'model_id',
        'expire_at',
    ];

    /**
     * append custom attributes to model.
     *
     * @var string[]
     */
    protected $appends = [
        'Product',
    ];


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $dates = [
        'expire_at',
    ];

    /**
     * it defines foreign key in relations.
     *
     * @return string
     */
    public function getForeignKey()
    {
        return 'offer_id';
    }

    public function getExpireAtAttribute()
    {
        return $this->attributes['expire_at'];
    }
}
