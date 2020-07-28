<?php

namespace Modules\Blog\Entities\Traits\Scope;

use Modules\Blog\Entities\Traits\Filterable\BlogPostSearchFilterable;
use Modules\Blog\Entities\Traits\Filterable\PublishFilterable;
use Modules\Blog\Entities\Traits\Filterable\TitleTranslationFilterable;

trait BlogPostScope
{
    use TitleTranslationFilterable, BlogPostSearchFilterable, PublishFilterable;
}
