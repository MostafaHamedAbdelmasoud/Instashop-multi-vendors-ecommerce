<?php

namespace Modules\CustomFieldOptions\Entities;

use App\Http\Filters\Filterable;
use Modules\Products\Entities\Product;
use Modules\Support\Traits\Selectable;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Modules\CustomFields\Entities\CustomField;
use Modules\CustomFieldOptions\Entities\Helpers\CustomFieldOptionHelper;

/**
 * Class Category.
 */
class CustomFieldOption extends Model
{
    use Translatable, Filterable, Selectable, CustomFieldOptionHelper;

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
        'product',
        'customField',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'product_id',
        'custom_field_id',
        'additional_price',
    ];

    /**
     * Get the number of models to return per page.
     *
     * @return int
     */
    public function getPerPage()
    {
        return request('perPage', parent::getPerPage());
    }

    /**
     * it defines foreign key in relations.
     *
     * @return string
     */
    public function getForeignKey()
    {
        return 'custom_field_option_id';
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
    public function customField()
    {
        return $this->belongsTo(CustomField::class);
    }
}
