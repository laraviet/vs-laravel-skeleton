<?php

namespace Modules\Product\Entities\Tenants;

use Hyn\Tenancy\Traits\UsesTenantConnection;

class ProductTranslation extends \Modules\Product\Entities\ProductTranslation
{
    use UsesTenantConnection;
}
