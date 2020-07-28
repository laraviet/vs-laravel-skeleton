<?php

namespace Modules\Blog\Entities\Traits\Relationship;

use Modules\Blog\Entities\BlogCategory;

trait BlogPostRelationship
{
    public function categories()
    {
        return $this->belongsToMany(BlogCategory::class, 'blog_category_post', 'blog_post_id', 'blog_category_id');
    }
}
