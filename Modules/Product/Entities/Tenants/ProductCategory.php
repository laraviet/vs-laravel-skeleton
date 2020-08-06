<?php

namespace Modules\Product\Entities\Tenants;

use Hyn\Tenancy\Traits\UsesTenantConnection;

class ProductCategory extends \Modules\Product\Entities\ProductCategory
{
    use UsesTenantConnection;
}
