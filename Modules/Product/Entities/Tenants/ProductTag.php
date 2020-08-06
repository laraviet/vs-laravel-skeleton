<?php

namespace Modules\Product\Entities\Tenants;

use Hyn\Tenancy\Traits\UsesTenantConnection;

class ProductTag extends \Modules\Product\Entities\ProductTag
{
    use UsesTenantConnection;
}
