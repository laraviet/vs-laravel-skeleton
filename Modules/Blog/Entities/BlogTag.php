<?php

namespace Modules\Blog\Entities;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;
use Modules\Blog\Entities\Traits\Attribute\BlogTagAttribute;
use Modules\Blog\Entities\Traits\Methods\BlogTagMethod;
use Modules\Blog\Entities\Traits\Scope\BlogTagScope;

class BlogTag extends Model
{
    use Cachable;
    use BlogTagScope, BlogTagMethod, BlogTagAttribute;

    protected $fillable = ['name', 'status'];
}
