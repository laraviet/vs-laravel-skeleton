<?php

namespace Modules\Blog\Entities;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;

class BlogPostTranslation extends Model
{
    use Cachable;

    protected $table = 'blog_post_translations';
    protected $fillable = ['title', 'content'];
}
