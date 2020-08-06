<?php

namespace Modules\Report\Entities\Tenants;

use Hyn\Tenancy\Traits\UsesTenantConnection;

class ReportRevenueDaily extends \Modules\Report\Entities\ReportRevenueDaily
{
    use UsesTenantConnection;
}
