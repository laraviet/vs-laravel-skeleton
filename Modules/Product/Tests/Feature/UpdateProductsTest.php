<?php

namespace Modules\Product\Tests\Feature;

use Modules\Core\Tests\Concerns\UpdateEntityTest;
use Modules\Product\Entities\Brand;
use Modules\Product\Entities\ProductCategory;
use Modules\Product\Tests\Base\BaseProductsTest;

class UpdateProductsTest extends BaseProductsTest
{
    use UpdateEntityTest;

    /** @test */
    public function authenticated_users_can_update_product()
    {
        $this->signIn();

        $brand = create(Brand::class);
        $category = create(ProductCategory::class);

        $this->updateEntity([
            localize_field('name')        => 'test name',
            localize_field('caption')     => 'test caption',
            localize_field('description') => 'test description',
            'brand_id'                    => $brand->id,
            'sku'                         => 'test sku',
            'regular_price'               => 400000,
            'quantity'                    => 10,
            'status'                      => 1,
            'categories'                  => [$category->id],
        ])->assertRedirect(route($this->index_route));

        tap($this->entity->refresh(), function ($product) use ($brand, $category) {
            $this->assertEquals('test name', $product->name);
            $this->assertEquals('test caption', $product->caption);
            $this->assertEquals('test description', $product->description);
            $this->assertEquals($brand->id, $product->brand->id);
            $this->assertEquals('test sku', $product->sku);
            $this->assertEquals(400000, $product->regular_price);
            $this->assertEquals(10, $product->quantity);
            $this->assertEquals(1, $product->status);
            $this->assertTrue($product->categories->contains($category));
        });
    }

    /** @test */
    public function update_product_requires_name_description_categories()
    {
        $this->signIn();

        $this->updateEntity()
            ->assertSessionHasErrors([
                localize_field('name'),
                localize_field('caption'),
                localize_field('description'),
                'brand_id',
                'sku',
                'regular_price',
                'quantity',
                'status',
                'categories',
            ]);
    }
}
