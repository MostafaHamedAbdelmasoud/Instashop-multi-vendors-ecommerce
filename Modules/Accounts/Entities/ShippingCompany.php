<?php

namespace Modules\Accounts\Entities;

use App\Http\Filters\Filterable;
use Modules\Accounts\Entities\User;
use Modules\Support\Traits\Selectable;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Modules\Accounts\Entities\ShippingCompanyOwner;

class ShippingCompany extends Model
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
        'ShippingCompanyOwner',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'owner_id',
    ];

    /**
     * Get the default foreign key name for the model.
     *
     * @return string
     */
    public function getForeignKey()
    {
        return 'shipping_company_id';
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function ShippingCompanyOwner()
    {
        return $this->belongsTo(ShippingCompanyOwner::class, 'owner_id', 'id');
    }

    public function ShippingCompanyPrices()
    {
        return $this->hasMany(ShippingCompanyPrice::class, 'shipping_company_id', 'id');
    }
}
