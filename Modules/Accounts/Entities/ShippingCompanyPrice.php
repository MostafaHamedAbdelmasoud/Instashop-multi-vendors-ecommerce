<?php

namespace Modules\Accounts\Entities;

use App\Http\Filters\Filterable;
use Modules\Accounts\Entities\User;
use Modules\Support\Traits\Selectable;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Modules\Accounts\Entities\ShippingCompanyOwner;
use Modules\Accounts\Entities\ShippingCompany;

class ShippingCompanyPrice extends Model
{
    use Translatable, Filterable, Selectable;


    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = [
        'translations',
        'ShippingCompanyOwner',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'shipping_company_id',
        'city_id',
        'price',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function ShippingCompany()
    {
        return $this->belongsTo(ShippingCompany::class, 'shipping_company_id', 'id');
    }

    public function City()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }
}
