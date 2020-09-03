<?php

namespace Modules\Orders\Entities;

use App\Http\Filters\Filterable;
use Illuminate\Database\Eloquent\Model;
use Modules\Orders\Entities\Helpers\OrderHelper;
use Modules\Support\Traits\Selectable;

/**
 * Class Category.
 */
class OrderStatusUpdate extends Model
{
    use Filterable, Selectable, OrderHelper;

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'order_id',
        'order_status_id',
        'notes',
    ];

    /**
     * it defines foreign key in relations.
     *
     * @return string
     */
    public function getForeignKey()
    {
        return 'order_status_update_id';
    }


}
