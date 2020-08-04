<?php

namespace Modules\Report\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\View\View;
use Modules\Report\Entities\ReportRevenueDaily;
use Modules\Report\Entities\ReportRevenueMonthly;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $months = [
            "1"  => "1",
            "2"  => "2",
            "3"  => "3",
            "4"  => "4",
            "5"  => "5",
            "6"  => "6",
            "7"  => "7",
            "8"  => "8",
            "9"  => "9",
            "10" => "10",
            "11" => "11",
            "12" => "12",
        ];
        $today = Carbon::now();
        $diffYear = 5;
        $thisYear = $today->year;
        $thisMonth = $today->month;
        $years = [];
        for ($year = $thisYear - $diffYear; $year <= $thisYear; $year ++) {
            $years[ $year ] = $year;
        }

        $currentTime = new \stdClass();

        if ($request->has('month')) {
            $currentTime->month = $request->get('month');
            $currentTime->year = $request->get('year');
        } else {
            $currentTime->month = $thisMonth;
            $currentTime->year = $thisYear;
        }

        $monthRevenue = ReportRevenueMonthly::where("month", $currentTime->month)->where("year", $currentTime->year)->first();
        $dayRevenues = ReportRevenueDaily::whereMonth("day", $currentTime->month)->whereYear("day", $currentTime->year)->get();

        return view('report::index', compact("months", "years", "currentTime", "monthRevenue", "dayRevenues"));
    }
}
