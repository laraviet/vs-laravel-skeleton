<?php

namespace Modules\Report\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Core\Database\Seeders\Traits\DisableForeignKeys;
use Modules\Core\Entities\Label;

class LabelTableSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();
        $module = 'report';
        Label::where('module', $module)->delete();

        $labels = [
            ["key" => "report", "vi" => ["value" => "Báo cáo"], "en" => ["value" => "Report"]],
            ["key" => "month", "vi" => ["value" => "Tháng"], "en" => ["value" => "Month"]],
            ["key" => "year", "vi" => ["value" => "Năm"], "en" => ["value" => "Year"]],
            ["key" => "filter", "vi" => ["value" => "Lọc"], "en" => ["value" => "Filter"]],
            ["key" => "month_revenue", "vi" => ["value" => "Doanh thu tháng"], "en" => ["value" => "Month Revenue"]],
            ["key" => "daily_revenue", "vi" => ["value" => "Doanh thu ngày"], "en" => ["value" => "Daily Revenue"]],
            ["key" => "order_revenue", "vi" => ["value" => "Doanh thu từ đơn hàng"], "en" => ["value" => "Order Revenue"]],
            ["key" => "total_revenue", "vi" => ["value" => "Tổng doanh thu"], "en" => ["value" => "Total Revenue"]],
            ["key" => "no_result", "vi" => ["value" => "Xin lỗi, hệ thống chưa có dữ liệu cho tháng được lựa chọn"], "en" => ["value" => "Sorry, there is no result for chosen duration."]],
            ["key" => "last_5_transactions", "vi" => ["value" => "5 Giao Dịch Mới Nhất"], "en" => ["value" => "Last 5 transactions"]],
        ];

        foreach ($labels as $label) {
            $label['module'] = $module;
            Label::create($label);
        }

        $this->enableForeignKeys();
    }
}
