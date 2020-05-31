<?php

namespace Modules\Accounts\Entities;

use App\Http\Filters\Filterable;
use Modules\Support\Traits\Selectable;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class Store extends Model
{
    use Translatable, Filterable, Selectable;

    /**
     * The translated attributes that are mass assignable.
     *
     * @var array
     */
    public $translatedAttributes = [
        'name',
        'description',
        'meta_description',
        'keywords',
    ];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = [
        'translations',
        'StoreOwner',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'owner_id',
        'plan',
        'domain',
        'rate',
        'is_verified',
    ];

    /**
     * Get the default foreign key name for the model.
     *
     * @return string
     */
    public function getForeignKey()
    {
        return 'store_id';
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function StoreOwner()
    {
        return $this->belongsTo(StoreOwner::class, 'owner_id', 'id');
    }

    public function calculateRate()
    {
        return $this->getAttribute('rate') /10;
    }
}
