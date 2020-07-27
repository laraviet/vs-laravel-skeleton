<?php

namespace Modules\Product\Entities\Traits\Filterable;

trait ProductTagSearchFilterable
{
    public function scopeSearch($query, $keyword)
    {
        return $query->name($keyword);
    }
}
