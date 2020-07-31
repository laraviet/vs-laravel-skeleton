<?php

namespace Modules\Product\Tests\Unit;

use Modules\Product\Entities\Brand;
use Modules\Product\Entities\Product;
use Modules\Product\Entities\ProductCategory;
use Modules\Product\Entities\ProductTag;
use Modules\Product\Tests\Base\BaseProductsTest;

class ProductsTest extends BaseProductsTest
{
    /** @test */
    public function product_has_status()
    {
        $this->assertCount(2, $this->entity->statuses());
    }

    /** @test */
    public function product_has_statusName()
    {
        $this->assertTrue(is_string($this->entity->statusName));
    }

    /** @test */
    public function product_belongs_to_brand()
    {
        $brand = create(Brand::class);
        $product = create(Product::class, ['brand_id' => $brand->id]);
        $this->assertInstanceOf(Brand::class, $product->brand);
        $this->assertEquals($product->brand->id, $brand->id);
        $this->assertEquals($product->brand->name, $brand->name);
    }

    /** @test */
    public function products_belongs_to_many_categories()
    {
        $categories = create(ProductCategory::class, [], 10);
        foreach ($categories as $category) {
            \DB::table('product_category_pivot')->insert([
                'product_category_id' => $category->id,
                'product_id'          => $this->entity->id
            ]);
        }

        $this->assertCount(10, $this->entity->categories);
        foreach ($categories as $category) {
            $this->assertTrue($this->entity->categories->contains($category));
        }
    }

    /** @test */
    public function products_belongs_to_many_tags()
    {
        $tags = create(ProductTag::class, [], 10);
        foreach ($tags as $tag) {
            \DB::table('product_tag_pivot')->insert([
                'product_tag_id' => $tag->id,
                'product_id'     => $this->entity->id
            ]);
        }

        $this->assertCount(10, $this->entity->tags);
        foreach ($tags as $tag) {
            $this->assertTrue($this->entity->tags->contains($tag));
        }
    }
}
