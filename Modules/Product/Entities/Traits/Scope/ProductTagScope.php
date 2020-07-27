<?php

namespace Modules\Product\Entities\Traits\Scope;

use Modules\Core\Entities\Traits\Filterable\NameFilterable;
use Modules\Product\Entities\Traits\Filterable\ActiveFilterable;
use Modules\Product\Entities\Traits\Filterable\ProductTagSearchFilterable;

trait ProductTagScope
{
    use NameFilterable, ProductTagSearchFilterable, ActiveFilterable;
}
