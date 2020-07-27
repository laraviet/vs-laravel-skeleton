<?php

namespace Modules\Product\Entities\Traits\Scope;

use Modules\Core\Entities\Traits\Filterable\TranslationNameFilterable;
use Modules\Product\Entities\Traits\Filterable\ActiveFilterable;
use Modules\Product\Entities\Traits\Filterable\ProductCategorySearchFilterable;

trait ProductCategoryScope
{
    use TranslationNameFilterable, ProductCategorySearchFilterable, ActiveFilterable;
}
