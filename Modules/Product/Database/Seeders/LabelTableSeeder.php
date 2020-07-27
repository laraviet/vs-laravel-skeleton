<?php

namespace Modules\Product\Database\Seeders;

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
        $module = 'product';
        Label::where('module', $module)->delete();

        $labels = [
            ["key" => "product_category", "vi" => ["value" => "Danh mục sản phẩm"], "en" => ["value" => "Product Category"]],
            ["key" => "featured", "vi" => ["value" => "Featured"], "en" => ["value" => "Featured"]],
            ["key" => "brand", "vi" => ["value" => "Hãng"], "en" => ["value" => "Brand"]],
            ["key" => "tag", "vi" => ["value" => "Tag"], "en" => ["value" => "Tag"]],
            ["key" => "product", "vi" => ["value" => "Sản phẩm"], "en" => ["value" => "Product"]],
            ["key" => "price", "vi" => ["value" => "Giá"], "en" => ["value" => "Price"]],
            ["key" => "caption", "vi" => ["value" => "Đầu đề"], "en" => ["value" => "Caption"]],
            ["key" => "feature_image", "vi" => ["value" => "Ảnh feature"], "en" => ["value" => "Feature Image"]],
            ["key" => "regular_price", "vi" => ["value" => "Giá bình thường"], "en" => ["value" => "Regular Price"]],
            ["key" => "sale_price", "vi" => ["value" => "Giá sale"], "en" => ["value" => "Sale Price"]],
            ["key" => "sku", "vi" => ["value" => "Mã Sku"], "en" => ["value" => "Sku Code"]],
            ["key" => "shippable", "vi" => ["value" => "Có thể ship"], "en" => ["value" => "Shippable"]],
            ["key" => "downloadable", "vi" => ["value" => "Có thể download"], "en" => ["value" => "Downloadable"]],
        ];

        foreach ($labels as $label) {
            $label['module'] = $module;
            Label::create($label);
        }

        $this->enableForeignKeys();
    }
}
