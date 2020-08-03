<?php

namespace Modules\Payment\Database\Seeders;

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
        $module = 'payment';
        Label::where('module', $module)->delete();

        $labels = [
            ["key" => "payment", "vi" => ["value" => "Thanh toán"], "en" => ["value" => "Payment"]],
            ["key" => "paid", "vi" => ["value" => "Đã thanh toán"], "en" => ["value" => "Paid"]],
            ["key" => "remain", "vi" => ["value" => "Còn lại"], "en" => ["value" => "Remain"]],
            ["key" => "comment", "vi" => ["value" => "Ghi chú"], "en" => ["value" => "Comment"]],
            ["key" => "invoice_number", "vi" => ["value" => "Mã hóa đơn"], "en" => ["value" => "Invoice Number"]],
        ];

        foreach ($labels as $label) {
            $label['module'] = $module;
            Label::create($label);
        }

        $this->enableForeignKeys();
    }
}
