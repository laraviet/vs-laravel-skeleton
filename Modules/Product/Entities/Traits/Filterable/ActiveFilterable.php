<?php

namespace Modules\Product\Entities\Traits\Filterable;

trait ActiveFilterable
{
    public function scopeActive($query)
    {
        return $query->where('status', 1); // 1 - active, 0 - inactive
    }
}
