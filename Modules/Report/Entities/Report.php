<?php

namespace Modules\Report\Entities;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = ['total_revenue', 'room_booking_count', 'room_revenue', 'service_booking_count', 'service_revenue'];
}
