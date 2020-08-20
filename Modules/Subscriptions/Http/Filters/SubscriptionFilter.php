<?php

namespace Modules\Subscriptions\Http\Filters;

use App\Http\Filters\BaseFilters;

class SubscriptionFilter extends BaseFilters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = [
        'model_type',
    ];

    /**
     * Filter the query by a given model_type.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function model_type($value)
    {
        if ($value) {
            return $this->builder->whereTranslationLike('model_type', "%$value%");
        }

        return $this->builder;
    }
}
