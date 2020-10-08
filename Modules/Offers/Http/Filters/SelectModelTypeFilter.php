<?php

namespace Modules\Offers\Http\Filters;

use Illuminate\Support\Arr;
use App\Http\Filters\BaseFilters;

class SelectModelTypeFilter extends BaseFilters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = [
        'fixed_discount_price',
        'selected_id',
    ];

    /**
     * Filter the query by a given name.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function fixed_discount_price($value)
    {
        if ($value) {
            return $this->builder->where('fixed_discount_price', "%$value%");
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
