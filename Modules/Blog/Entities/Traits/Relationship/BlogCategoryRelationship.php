<?php

namespace Modules\Blog\Entities\Traits\Relationship;

use Modules\Blog\Entities\BlogCategory;

trait BlogCategoryRelationship
{
    public function parent()
    {
        return $this->belongsTo(BlogCategory::class, 'parent_id', 'id');
    }
}
