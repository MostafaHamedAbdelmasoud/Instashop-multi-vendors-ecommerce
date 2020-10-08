<?php

namespace Modules\TemplateBanners\Entities;

use App\Http\Filters\Filterable;
use Modules\Categories\Entities\Category;
use Modules\Orders\Entities\Order;
use Modules\Support\Traits\Selectable;
use Illuminate\Database\Eloquent\Model;
use Modules\TemplateBanners\Entities\Helpers\TemplateBannerHelper;

/**
 * Class Category.
 */
class TemplateBanner extends Model
{
    use  Filterable, Selectable, TemplateBannerHelper;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'title',
        'store_id',
        'body',
        'template' ,
        'position',
        'target_type',
        'target_id',
        'url',
    ];

    /**
     * it defines foreign key in relations.
     *
     * @return string
     */
    public function getForeignKey()
    {
        return 'template_banner_id';
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Category()
    {
        return $this->belongsTo(Category::class);
    }
}
