<?php

namespace Modules\OrderProducts\Entities;

use App\Http\Filters\Filterable;
use Modules\Orders\Entities\Order;
use Modules\Stores\Entities\Store;
use Modules\Products\Entities\Product;
use Modules\Support\Traits\Selectable;
use Illuminate\Database\Eloquent\Model;
use Modules\Categories\Entities\Category;
use Modules\CustomFields\Entities\CustomField;
use Modules\CustomFieldOptions\Entities\CustomFieldOption;
use Modules\OrderProducts\Entities\Helpers\OrderProductHelper;

/**
 * Class Category.
 */
class OrderProductFieldValue extends Model
{
    use  Filterable, Selectable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'order__product_id',
        'custom_field_id',
        'value',
        'option_id',
        'additional_price',
    ];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = [
        'customField',
        'customFieldOption',
    ];

    /**
     * it defines foreign key in relations.
     *
     * @return string
     */
    public function getForeignKey()
    {
        return 'order_product_field_value_id';
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function orderProduct()
    {
        return $this->belongsTo(OrderProduct::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customField()
    {
        return $this->belongsTo(CustomField::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customFieldOption()
    {
        return $this->belongsTo(CustomFieldOption::class, 'option_id');
    }
}
