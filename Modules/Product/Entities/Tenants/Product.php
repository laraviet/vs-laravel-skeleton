<?php

namespace Modules\Product\Entities\Tenants;

use Hyn\Tenancy\Traits\UsesTenantConnection;

class Product extends \Modules\Product\Entities\Product
{
    use UsesTenantConnection;
}
