<?php

namespace Modules\Order\Entities\Traits\Filterable;

trait OrderIncompletedFilterable
{
    public function scopeIncomplete($query)
    {
        return $query->where('status', '!=', self::STATUS_COMPLETED);
    }
}
