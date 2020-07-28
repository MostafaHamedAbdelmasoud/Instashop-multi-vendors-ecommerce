<?php

namespace Modules\CustomFields\Entities;

use Illuminate\Database\Eloquent\Model;

class CustomFieldTranslation extends Model
{
    /**
     * The attribute    s that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
