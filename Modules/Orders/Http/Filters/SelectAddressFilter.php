<?php

namespace Modules\Orders\Http\Filters;

use Illuminate\Support\Arr;
use App\Http\Filters\BaseFilters;

class SelectAddressFilter extends BaseFilters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = [
        'address',
        'selected_id',
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
            return $this->builder->where('address', $value);
        }

        return $this->builder;
    }

    /**
     * Sorting results by the given id.
     *
     * @param $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function selectedId($value)
    {
        if ($value) {
            $this->builder->sortingByIds($value);
        }

        return $this->builder;
    }
}
