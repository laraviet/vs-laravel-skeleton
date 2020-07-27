<?php

namespace Modules\Product\Entities\Traits\Scope;

use Modules\Core\Entities\Traits\Filterable\TranslationNameFilterable;
use Modules\Product\Entities\Traits\Filterable\ActiveFilterable;
use Modules\Product\Entities\Traits\Filterable\ProductSearchFilterable;
use Modules\Product\Entities\Traits\Filterable\SkuFilterable;

trait ProductScope
{
    use TranslationNameFilterable, ProductSearchFilterable, ActiveFilterable, SkuFilterable;
}
