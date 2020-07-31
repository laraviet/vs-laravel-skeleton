<?php

namespace Modules\Product\Tests\Feature;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Modules\Core\Tests\Concerns\CreateEntityTest;
use Modules\Product\Tests\Base\BaseProductCategoriesTest;

class CreateProductCategoriesTest extends BaseProductCategoriesTest
{
    use CreateEntityTest;

    /** @test */
    public function authenticated_users_can_create_new_product_category()
    {
        $this->signIn();

        Storage::fake('photos');

        $this->storeEntity([
            localize_field('name')        => 'test',
            localize_field('description') => 'test description',
            'parent_id'                   => 0,
            'status'                      => 1,
            'thumbnail'                   => UploadedFile::fake()->image('test.jpg'),
        ])
            ->assertRedirect(route($this->index_route));
    }

    /** @test */
    public function create_product_category_requires_name_status_thumbnail()
    {
        $this->signIn();

        $this->storeEntity()
            ->assertSessionHasErrors([
                localize_field('name'),
                localize_field('description'),
                'parent_id',
                'status',
                'thumbnail',
            ]);
    }
}
