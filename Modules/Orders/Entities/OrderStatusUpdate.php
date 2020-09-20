<?php

namespace Modules\Orders\Entities;

use App\Http\Filters\Filterable;
use Modules\Support\Traits\Selectable;
use Illuminate\Database\Eloquent\Model;
use Modules\OrderStatuses\Entities\OrderStatus;
use Modules\Orders\Entities\Helpers\OrderHelper;

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
    protected $with = [
        'order',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'order_status_id',
        'order_id',
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

    /**
     * it defines foreign key in relations.
     *
     * @return string
     */
    public function orderStatus()
    {
        return $this->belongsTo(OrderStatus::class);
    }

    /**
     * it defines foreign key in relations.
     *
     * @return string
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
