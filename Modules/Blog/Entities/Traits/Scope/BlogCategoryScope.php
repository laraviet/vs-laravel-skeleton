<?php

namespace Modules\Blog\Entities\Traits\Scope;

use Modules\Blog\Entities\Traits\Filterable\BlogCategorySearchFilterable;
use Modules\Core\Entities\Traits\Filterable\TranslationNameFilterable;
use Modules\Product\Entities\Traits\Filterable\ActiveFilterable;

trait BlogCategoryScope
{
    use TranslationNameFilterable, BlogCategorySearchFilterable, ActiveFilterable;
}
