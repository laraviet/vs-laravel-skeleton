<?php

namespace Modules\Payment\Entities\Tenants;

use Hyn\Tenancy\Traits\UsesTenantConnection;

class Payment extends \Modules\Payment\Entities\Payment
{
    use UsesTenantConnection;
}
