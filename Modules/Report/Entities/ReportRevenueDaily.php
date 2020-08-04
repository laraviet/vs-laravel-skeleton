<?php

namespace Modules\Report\Entities;

use Illuminate\Database\Eloquent\Model;

class ReportRevenueDaily extends Model
{
    protected $table = 'report_revenue_daily';
    protected $fillable = ['day', 'total_revenue', 'room_booking_count', 'room_revenue', 'service_booking_count', 'service_revenue'];
}
