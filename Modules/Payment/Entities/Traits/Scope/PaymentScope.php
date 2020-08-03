<?php

namespace Modules\Payment\Entities\Traits\Scope;

use Modules\Payment\Entities\Traits\Filterable\OrderNumberFilterable;
use Modules\Payment\Entities\Traits\Filterable\SearchFilterable;

trait PaymentScope
{
    use SearchFilterable, OrderNumberFilterable;
}
