<?php

namespace Modules\Stores\Entities;

use App\Http\Filters\Filterable;
use Modules\Stores\Entities\Store;
use Modules\Support\Traits\Selectable;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

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
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function Store()
    {
        return $this->belongsTo(Store::class, 'store_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subCategories()
    {
        return $this->hasMany(Category::class);
    }
}
