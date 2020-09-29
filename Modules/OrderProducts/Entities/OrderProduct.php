<?php

namespace Modules\OrderProducts\Entities;

use App\Http\Filters\Filterable;
use Modules\Orders\Entities\Order;
use Modules\Stores\Entities\Store;
use Modules\Products\Entities\Product;
use Modules\Support\Traits\Selectable;
use Illuminate\Database\Eloquent\Model;
use Modules\Categories\Entities\Category;
use Modules\OrderProducts\Entities\Helpers\OrderProductHelper;

/**
 * Class Category.
 */
class OrderProduct extends Model
{
    use  Filterable, Selectable, OrderProductHelper;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
        'total',
    ];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = [
        'order',
        'product',
        'orderProductFieldValues',
    ];

    /**
     * it defines foreign key in relations.
     *
     * @return string
     */
    public function getForeignKey()
    {
        return 'order_product_id';
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderProductFieldValues()
    {
        return $this->hasMany(OrderProductFieldValue::class);
    }
}
