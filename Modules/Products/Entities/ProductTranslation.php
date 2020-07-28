<?php

namespace Modules\Products\Entities;

use Illuminate\Database\Eloquent\Model;

class ProductTranslation extends Model
{
    /**
     * The attribute    s that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'meta_description',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
