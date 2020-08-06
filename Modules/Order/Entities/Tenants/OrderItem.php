<?php

namespace Modules\Order\Entities\Tenants;

use Hyn\Tenancy\Traits\UsesTenantConnection;

class OrderItem extends \Modules\Order\Entities\OrderItem
{
    use UsesTenantConnection;
}
