<?php

namespace Modules\Product\Entities\Traits\Filterable;

trait SkuFilterable
{
    public function scopeSku($query, $code)
    {
        return $query->where('sku', $code);
    }
}
