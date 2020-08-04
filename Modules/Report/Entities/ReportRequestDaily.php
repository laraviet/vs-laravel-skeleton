<?php

namespace Modules\Report\Entities;

use Illuminate\Database\Eloquent\Model;

class ReportRequestDaily extends Model
{
    protected $table = 'report_request_daily';
    protected $fillable = ['day', 'total_request', 'offer_request', 'service_request'];
}
