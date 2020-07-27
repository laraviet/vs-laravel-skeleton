<?php

namespace Modules\Product\Entities\Traits\Scope;

use Modules\Core\Entities\Traits\Filterable\NameFilterable;
use Modules\Product\Entities\Traits\Filterable\ActiveFilterable;
use Modules\Product\Entities\Traits\Filterable\BrandSearchFilterable;

trait BrandScope
{
    use NameFilterable, BrandSearchFilterable, ActiveFilterable;
}
