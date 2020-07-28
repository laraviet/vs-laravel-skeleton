<?php

namespace Modules\Blog\Entities\Traits\Filterable;

trait PublishFilterable
{
    public function scopePublish($query)
    {
        return $query->where('status', 1); // 1 - published, 0 - draff
    }
}
