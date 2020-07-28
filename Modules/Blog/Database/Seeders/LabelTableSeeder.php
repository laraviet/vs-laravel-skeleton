<?php

namespace Modules\Blog\Database\Seeders;

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
        $module = 'blog';
        Label::where('module', $module)->delete();

        $labels = [
            ["key" => "blog_management", "vi" => ["value" => "Quản lý blog"], "en" => ["value" => "Blog Management"]],
            ["key" => "blog_category", "vi" => ["value" => "Danh mục bài viết"], "en" => ["value" => "Blog Category"]],
        ];

        foreach ($labels as $label) {
            $label['module'] = $module;
            Label::create($label);
        }

        $this->enableForeignKeys();
    }
}
