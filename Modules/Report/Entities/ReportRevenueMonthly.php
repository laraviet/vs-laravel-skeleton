<?php

namespace Modules\Report\Entities;

use Illuminate\Database\Eloquent\Model;

class ReportRevenueMonthly extends Model
{
    protected $table = 'report_revenue_monthly';
    protected $fillable = ['year', 'month', 'total_revenue', 'room_booking_count', 'room_revenue', 'service_booking_count', 'service_revenue'];
}
