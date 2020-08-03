<?php

namespace Modules\Order\Entities\Traits\Scope;

use Modules\Order\Entities\Traits\Filterable\OrderIncompletedFilterable;

trait OrderScope
{
    use OrderIncompletedFilterable;
}
