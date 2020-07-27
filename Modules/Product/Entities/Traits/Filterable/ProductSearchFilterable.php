<?php

namespace Modules\Product\Entities\Traits\Filterable;

use Illuminate\Database\Eloquent\Builder;

trait ProductSearchFilterable
{
    public function scopeSearch($query, $keyword)
    {
        return $query->name($keyword)->orWhere(function (Builder $query) use ($keyword) {
            return $query->sku($keyword);
        });
    }
}
