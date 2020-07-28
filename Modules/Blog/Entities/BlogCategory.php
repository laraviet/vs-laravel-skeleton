<?php

namespace Modules\Blog\Entities;

use Astrotomic\Translatable\Translatable;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;
use Modules\Blog\Entities\Traits\Attribute\BlogCategoryAttribute;
use Modules\Blog\Entities\Traits\Methods\BlogCategoryMethod;
use Modules\Blog\Entities\Traits\Relationship\BlogCategoryRelationship;
use Modules\Blog\Entities\Traits\Scope\BlogCategoryScope;
use Modules\Core\Entities\Traits\HasImageModel;
use Spatie\MediaLibrary\HasMedia\HasMedia;

class BlogCategory extends Model implements HasMedia
{
    use Translatable, Cachable, HasImageModel;
    use BlogCategoryAttribute, BlogCategoryMethod, BlogCategoryRelationship, BlogCategoryScope;

    const THUMBNAIL = 'thumbnail';

    protected $table = 'blog_categories';
    protected $fillable = ['parent_id', 'status'];
    public $translatedAttributes = ['name'];
}
