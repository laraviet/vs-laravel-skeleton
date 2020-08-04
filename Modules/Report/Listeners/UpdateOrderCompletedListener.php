<?php

namespace Modules\Report\Listeners;

use Carbon\Carbon;
use Modules\Report\Entities\Report;
use Modules\Report\Entities\ReportRevenueDaily;
use Modules\Report\Entities\ReportRevenueMonthly;

class UpdateOrderCompletedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param object $event
     * @return void
     */
    public function handle($event)
    {
        $order = $event->model;
        $today = Carbon::now();

        $reportDaily = ReportRevenueDaily::firstOrCreate([
            "day" => $today->toDateString()
        ]);

        $reportDaily->total_revenue += $order->amount;
        $reportDaily->order_count += 1;
        $reportDaily->order_revenue += $order->amount;

        $reportMonthly = ReportRevenueMonthly::firstOrCreate([
            "month" => $today->month,
            "year"  => $today->year,
        ]);

        $reportMonthly->total_revenue += $order->amount;
        $reportMonthly->order_count += 1;
        $reportMonthly->order_revenue += $order->amount;

        $report = Report::firstOrCreate(["id" => 1]);
        $report->total_revenue += $order->amount;
        $report->order_count += 1;
        $report->order_revenue += $order->amount;

        $reportDaily->save();
        $reportMonthly->save();
        $report->save();
    }
}
