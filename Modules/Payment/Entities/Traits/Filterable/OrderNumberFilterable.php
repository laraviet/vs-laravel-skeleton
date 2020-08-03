<?php


namespace Modules\Payment\Entities\Traits\Filterable;


use Illuminate\Database\Eloquent\Builder;

trait OrderNumberFilterable
{
    /**
     * Scope a query to only include records have name that contains $name.
     *
     * @param Builder $query
     * @param $code
     * @return Builder
     */
    public function scopeOrderNumber($query, $code)
    {
        return $query->whereHas('order', function ($q) use ($code) {
            $q->where('order_number', 'LIKE', "%{$code}%");
        });
    }
}
