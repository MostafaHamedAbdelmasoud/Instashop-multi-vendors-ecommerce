<?php

namespace Modules\Stores\Entities;

use Illuminate\Database\Eloquent\Model;

class StoreTranslation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'meta_description',
        'keywords',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
