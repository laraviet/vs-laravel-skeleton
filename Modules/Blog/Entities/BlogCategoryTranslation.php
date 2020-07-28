<?php

namespace Modules\Blog\Entities;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;

class BlogCategoryTranslation extends Model
{
    use Cachable;

    protected $table = 'blog_category_translations';
    protected $fillable = ['name'];
}
