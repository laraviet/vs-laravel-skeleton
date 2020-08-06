<?php

namespace Modules\Product\Entities\Tenants;

use Hyn\Tenancy\Traits\UsesTenantConnection;

class ProductCategoryTranslation extends \Modules\Product\Entities\ProductCategoryTranslation
{
    use UsesTenantConnection;
}
