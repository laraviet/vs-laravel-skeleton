<?php

namespace Modules\Payment\Entities\Traits\Filterable;


use Illuminate\Database\Eloquent\Builder;

trait SearchFilterable
{
    /**
     * Scope a query to only include records have name that contains $name.
     *
     * @param Builder $query
     * @param $keyword
     * @return Builder
     */
    public function scopeSearch($query, $keyword)
    {
        return $query->orderNumber($keyword);
    }
}
