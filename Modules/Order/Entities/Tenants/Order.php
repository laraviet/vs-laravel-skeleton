<?php

namespace Modules\Order\Entities\Tenants;

use Hyn\Tenancy\Traits\UsesTenantConnection;

class Order extends \Modules\Order\Entities\Order
{
    use UsesTenantConnection;
}
