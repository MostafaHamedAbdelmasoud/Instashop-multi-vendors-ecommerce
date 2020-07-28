<?php

namespace Modules\CustomFields\Entities;

use App\Http\Filters\Filterable;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Categories\Entities\Category;
use Modules\CustomFields\Entities\Helpers\CustomFieldHelper;
use Modules\Stores\Entities\Store;
use Modules\Support\Traits\Selectable;

/**
 * Class Category.
 */
class CustomField extends Model
{
    use Translatable, Filterable, Selectable, CustomFieldHelper;

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
        return 'custom_field_id';
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
