<?php

namespace Modules\Blog\Entities\Traits\Filterable;

trait BlogTagSearchFilterable
{
    public function scopeSearch($query, $keyword)
    {
        return $query->name($keyword);
    }
}
