<?php

namespace Modules\Accounts\Entities;

use App\Http\Filters\Filterable;
use Modules\Countries\Entities\City;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Address.
 */
class Address extends Model
{
    use Filterable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'address',
        'city_id',
        'is_primary',
    ];


    /**
     * to make eager loading when get model.
     * @var string[]
     */
    protected $with = [
        'customer',
    ];

    public function getForeignKey()
    {
        return  'address_id';
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
