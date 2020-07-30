<?php

namespace Modules\Order\Database\Seeders;

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
        $module = 'order';
        Label::where('module', $module)->delete();

        $labels = [
            ["key" => "pending", "vi" => ["value" => "Chờ xử lý"], "en" => ["value" => "Pending"]],
            ["key" => "processing", "vi" => ["value" => "Đang xử lý"], "en" => ["value" => "Processing"]],
            ["key" => "submitted", "vi" => ["value" => "Đã submit"], "en" => ["value" => "Submitted"]],
            ["key" => "canceled", "vi" => ["value" => "Đã hủy bỏ"], "en" => ["value" => "Canceled"]],
            ["key" => "completed", "vi" => ["value" => "Đã hoàn thành"], "en" => ["value" => "Completed"]],
            ["key" => "order", "vi" => ["value" => "Đơn hàng"], "en" => ["value" => "Order"]],
            ["key" => "order_number", "vi" => ["value" => "Mã đơn hàng"], "en" => ["value" => "Order Number"]],
            ["key" => "order_by", "vi" => ["value" => "Người đặt hàng"], "en" => ["value" => "Order By"]],
            ["key" => "order_management", "vi" => ["value" => "Quản lý đơn hàng"], "en" => ["value" => "Order Management"]],
            ["key" => "amount", "vi" => ["value" => "Giá tiền"], "en" => ["value" => "Amount"]],
            ["key" => "item", "vi" => ["value" => "Item"], "en" => ["value" => "Item"]],
            ["key" => "unit_price", "vi" => ["value" => "Đơn giá"], "en" => ["value" => "Unit Price"]],
            ["key" => "total", "vi" => ["value" => "Tổng"], "en" => ["value" => "Total"]],
        ];

        foreach ($labels as $label) {
            $label['module'] = $module;
            Label::create($label);
        }

        $this->enableForeignKeys();
    }
}
