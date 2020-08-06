<?php

namespace Modules\Report\Entities\Tenants;

use Hyn\Tenancy\Traits\UsesTenantConnection;

class Report extends \Modules\Report\Entities\Report
{
    use UsesTenantConnection;
}
