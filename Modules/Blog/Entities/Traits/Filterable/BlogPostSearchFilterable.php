<?php

namespace Modules\Blog\Entities\Traits\Filterable;

trait BlogPostSearchFilterable
{
    public function scopeSearch($query, $keyword)
    {
        return $query->title($keyword);
    }
}
