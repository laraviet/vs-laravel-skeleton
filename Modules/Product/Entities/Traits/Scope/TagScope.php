<?php

namespace Modules\Product\Entities\Traits\Scope;

use Modules\Core\Entities\Traits\Filterable\TranslationNameFilterable;
use Modules\Product\Entities\Traits\Filterable\ActiveFilterable;
use Modules\Product\Entities\Traits\Filterable\TagSearchFilterable;

trait TagScope
{
    use TranslationNameFilterable, TagSearchFilterable, ActiveFilterable;
}
