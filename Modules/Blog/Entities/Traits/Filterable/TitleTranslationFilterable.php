<?php

namespace Modules\Blog\Entities\Traits\Filterable;

use Illuminate\Database\Eloquent\Builder;

trait TitleTranslationFilterable
{
    /**
     * Scope a query to only include records have name that contains $name.
     *
     * @param Builder $query
     * @param $title
     * @return Builder
     */
    public function scopeTitle($query, $title)
    {
        return $query->whereTranslationLike('title', "%{$title}%");
    }
}
