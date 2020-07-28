<?php

namespace Modules\Blog\Entities;

use Astrotomic\Translatable\Translatable;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;
use Modules\Blog\Entities\Traits\Attribute\BlogPostAttribute;
use Modules\Blog\Entities\Traits\Methods\BlogPostMethod;
use Modules\Blog\Entities\Traits\Relationship\BlogPostRelationship;
use Modules\Blog\Entities\Traits\Scope\BlogPostScope;
use Modules\Core\Entities\Traits\HasImageModel;
use Spatie\MediaLibrary\HasMedia\HasMedia;

class BlogPost extends Model implements HasMedia
{
    use Translatable, Cachable, HasImageModel;
    use BlogPostScope, BlogPostAttribute, BlogPostMethod, BlogPostRelationship;

    const FEATURE_IMAGE = 'feature';

    protected $table = 'blog_posts';
    protected $fillable = ['created_by', 'published_at', 'status'];
    public $translatedAttributes = ['title', 'content'];
}
