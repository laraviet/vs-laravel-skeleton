<?php

namespace Modules\Product\Tests\Unit;

use Modules\Product\Entities\Product;
use Modules\Product\Entities\ProductCategory;
use Modules\Product\Tests\Base\BaseProductCategoriesTest;

class ProductCategoriesTest extends BaseProductCategoriesTest
{
    /** @test */
    public function product_category_has_status()
    {
        $this->assertCount(2, $this->entity->statuses());
    }

    /** @test */
    public function product_category_has_statusName()
    {
        $this->assertTrue(is_string($this->entity->statusName));
    }

    /** @test */
    public function product_category_belongs_to_parent()
    {
        $childCategory = create(ProductCategory::class, ['parent_id' => $this->entity]);
        $this->assertInstanceOf(ProductCategory::class, $childCategory->parent);
        $this->assertEquals($this->entity->id, $childCategory->parent->id);
        $this->assertEquals($this->entity->name, $childCategory->parent->name);
    }

    /** @test */
    public function product_category_has_many_products()
    {
        $products = create(Product::class, [], 10);
        foreach ($products as $product) {
            \DB::table('product_category_pivot')->insert([
                'product_category_id' => $this->entity->id,
                'product_id'          => $product->id
            ]);
        }

        $this->assertCount(10, $this->entity->products);
        foreach ($products as $product) {
            $this->assertTrue($this->entity->products->contains($product));
        }
    }
}
