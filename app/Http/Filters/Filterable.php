<?php

namespace App\Http\Filters;

use Illuminate\Support\Facades\App;

/**
 * @method static \Illuminate\Database\Eloquent\Builder|$this filter(BaseFilters $filters = null)
 */
trait Filterable
{
    /**
     * Apply all relevant thread filters.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param \App\Http\Filters\BaseFilters $filters
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFilter($query, BaseFilters $filters = null)
    {
        if (! $filters) {
            $filters = App::make($this->filter);
        }

        return $filters->apply($query);
    }
}
