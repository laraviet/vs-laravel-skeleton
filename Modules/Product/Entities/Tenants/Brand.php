<?php

namespace Modules\Product\Entities\Tenants;

use Hyn\Tenancy\Traits\UsesTenantConnection;

class Brand extends \Modules\Product\Entities\Brand
{
    use UsesTenantConnection;
}
