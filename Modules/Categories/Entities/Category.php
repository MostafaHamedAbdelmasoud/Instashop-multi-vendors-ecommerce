<?php

namespace Modules\Categories\Entities;

use App\Http\Filters\Filterable;
use Modules\Stores\Entities\Store;
use Modules\Support\Traits\Selectable;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Category.
 */
class Category extends Model
{
    use Translatable, Filterable, Selectable;

    /**
     * The translated attributes that are mass assignable.
     *
     * @var array
     */
    public $translatedAttributes = ['name'];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = [
        'translations',
        'Store',
        'subCategories',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'store_id',
        'parent_id',
        'published_at',
    ];


    /**
     * specify dates attributes in model.
     * @var string[]
     */
    protected $dates = ['published_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function subCategories()
    {
        return $this->hasOne(Category::class, 'id', 'parent_id');
    }

    /**
     * @return HasMany
     */
    public function product()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * get published_at date attributes in model with M/d/y foramt.
     *
     * @return mixed
     */
    public function getPublishedDate()
    {
        return $this->published_at->format('m/d/Y');
    }
}
