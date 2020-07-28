<?php

namespace Modules\Blog\Entities\Traits\Scope;

use Modules\Blog\Entities\Traits\Filterable\BlogTagSearchFilterable;
use Modules\Core\Entities\Traits\Filterable\NameFilterable;
use Modules\Product\Entities\Traits\Filterable\ActiveFilterable;

trait BlogTagScope
{
    use NameFilterable, BlogTagSearchFilterable, ActiveFilterable;
}
