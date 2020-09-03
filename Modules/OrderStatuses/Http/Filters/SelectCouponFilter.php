<?php

namespace Modules\OrderStatuses\Http\Filters;

use Illuminate\Support\Arr;
use App\Http\Filters\BaseFilters;

class SelectCouponFilter extends BaseFilters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = [
        'code',
        'selected_id',
    ];

    /**
     * Filter the query by a given code.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function code($value)
    {
        if ($value) {
            return $this->builder->whereTranslationLike('code', "%$value%");
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
