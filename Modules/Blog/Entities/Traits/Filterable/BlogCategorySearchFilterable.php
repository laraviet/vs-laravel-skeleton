<?php

namespace Modules\Blog\Entities\Traits\Filterable;

trait BlogCategorySearchFilterable
{
    public function scopeSearch($query, $keyword)
    {
        return $query->name($keyword);
    }
}
