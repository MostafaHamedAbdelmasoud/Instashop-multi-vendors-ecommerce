<?php

namespace Modules\ShippingCompanies\Entities;

use Modules\Accounts\Entities\User;
use Illuminate\Database\Eloquent\Model;
use Modules\Countries\Entities\Country;

class ShippingCompany extends Model
{
    /**
     * The translated attributes that are mass assignable.
     *
     * @var array
     */
    public $translatedAttributes = ['name'];

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
    ];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = [
        'translations',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
