<?php

namespace Modules\Report\Entities;

use Illuminate\Database\Eloquent\Model;

class ReportRequestMonthly extends Model
{
    protected $table = 'report_request_monthly';
    protected $fillable = ['year', 'month', 'total_request', 'offer_request', 'service_request'];
}
