<?php

namespace Modules\Report\Entities\Tenants;

use Hyn\Tenancy\Traits\UsesTenantConnection;

class ReportRevenueMonthly extends \Modules\Report\Entities\ReportRevenueMonthly
{
    use UsesTenantConnection;
}
