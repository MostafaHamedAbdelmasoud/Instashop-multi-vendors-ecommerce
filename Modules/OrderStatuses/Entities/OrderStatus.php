<?php

namespace Modules\OrderStatuses\Entities;

use App\Http\Filters\Filterable;
use Modules\Support\Traits\Selectable;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Modules\OrderStatuses\Entities\Helpers\OrderStatusHelper;

/**
 * Class Category.
 */
class OrderStatus extends Model
{
    use Translatable, Filterable, Selectable, OrderStatusHelper;

    /**
     * The translated attributes that are mass assignable.
     *
     * @var array
     */
    public $translatedAttributes = [
        'name',
    ];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = [
        'translations',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'type',
    ];

    /**
     * it defines foreign key in relations.
     *
     * @return string
     */
    public function getForeignKey()
    {
        return 'order_status_id';
    }
}
