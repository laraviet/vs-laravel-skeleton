<?php

namespace Modules\Blog\Entities\Traits\Relationship;

use Modules\Blog\Entities\BlogCategory;
use Modules\Blog\Entities\BlogPost;

trait BlogCategoryRelationship
{
    public function parent()
    {
        return $this->belongsTo(BlogCategory::class, 'parent_id', 'id');
    }

    public function posts()
    {
        return $this->belongsToMany(BlogPost::class, 'blog_category_post', 'blog_category_id', 'blog_post_id');
    }
}
