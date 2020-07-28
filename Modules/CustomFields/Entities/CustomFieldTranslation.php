<?php

namespace Modules\CustomFields\Entities;

use App\Http\Filters\Filterable;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\CustomFields\Entities\Helpers\CustomFieldHelper;
use Modules\Support\Traits\Selectable;

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
