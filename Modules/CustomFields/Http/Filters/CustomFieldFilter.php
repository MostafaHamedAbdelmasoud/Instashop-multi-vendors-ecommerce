<?php

namespace Modules\CustomFields\Http\Filters;

use App\Http\Filters\BaseFilters;

class CustomFieldFilter extends BaseFilters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = [
        'name',
    ];

    /**
     * Filter the query by a given name.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function name($value)
    {
        if ($value) {
            return $this->builder->whereTranslation('name', 'like', "%$value%");
        }

        return $this->builder;
    }
}
