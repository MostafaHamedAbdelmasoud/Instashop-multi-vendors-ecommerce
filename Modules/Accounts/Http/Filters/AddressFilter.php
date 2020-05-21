<?php

namespace Modules\Accounts\Http\Filters;

use App\Http\Filters\BaseFilters;

class AddressFilter extends BaseFilters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = [
        'address',
        'city_id',
    ];

    /**
     * Filter the query by a given address.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function address($value)
    {
        if ($value) {
            return $this->builder->where('address', 'like', "%$value%");
        }

        return $this->builder;
    }

    /**
     * Filter the query to include addresses by city id.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function cityId($value)
    {
        if ($value) {
            return $this->builder->where('city_id', $value);
        }

        return $this->builder;
    }
}
