<?php

namespace Modules\Product\Tests\Feature;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Modules\Core\Tests\Concerns\CreateEntityTest;
use Modules\Product\Entities\Brand;
use Modules\Product\Entities\ProductCategory;
use Modules\Product\Tests\Base\BaseProductsTest;

class CreateProductsTest extends BaseProductsTest
{
    use CreateEntityTest;

    /** @test */
    public function authenticated_users_can_create_new_product()
    {
        $this->signIn();

        $brand = create(Brand::class);
        $category = create(ProductCategory::class);

        Storage::fake('photos');

        $this->storeEntity([
            localize_field('name')        => 'test name',
            localize_field('caption')     => 'test caption',
            localize_field('description') => 'test description',
            'brand_id'                    => $brand->id,
            'sku'                         => 'test sku',
            'regular_price'               => 400000,
            'quantity'                    => 10,
            'status'                      => 1,
            'feature_image'               => UploadedFile::fake()->image('test.jpg'),
            'categories'                  => [$category->id],
        ])
            ->assertRedirect(route($this->index_route));
    }

    /** @test */
    public function create_product_requires_name_status_categories()
    {
        $this->signIn();

        $this->storeEntity()
            ->assertSessionHasErrors([
                localize_field('name'),
                localize_field('caption'),
                localize_field('description'),
                'brand_id',
                'sku',
                'regular_price',
                'quantity',
                'status',
                'feature_image',
                'categories',
            ]);
    }
}
