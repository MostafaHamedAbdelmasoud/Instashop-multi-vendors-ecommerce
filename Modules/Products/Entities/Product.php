<?php

namespace Modules\Products\Entities;

use App\Http\Filters\Filterable;
use Modules\Stores\Entities\Store;
use Modules\Support\Traits\Selectable;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Modules\Categories\Entities\Category;
use Modules\Products\Entities\Helpers\ProductHelper;

/**
 * Class Category.
 */
class Product extends Model
{
    use Translatable, Filterable, Selectable, ProductHelper;

    /**
     * The translated attributes that are mass assignable.
     *
     * @var array
     */
    public $translatedAttributes = [
        'name',
        'description',
        'meta_description',
    ];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = [
        'translations',
        'store',
        'category',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'store_id',
        'category_id',
        'code',
        'old_price',
        'price',
        'weight',
        'stock',
    ];

    /**
     * it defines foreign key in relations.
     *
     * @return string
     */
    public function getForeignKey()
    {
        return 'product_id';
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
