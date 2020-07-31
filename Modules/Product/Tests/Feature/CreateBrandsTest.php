<?php

namespace Modules\Product\Tests\Feature;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Modules\Core\Tests\Concerns\CreateEntityTest;
use Modules\Product\Tests\Base\BaseBrandsTest;

class CreateBrandsTest extends BaseBrandsTest
{
    use CreateEntityTest;

    /** @test */
    public function authenticated_users_can_create_new_brand()
    {
        $this->signIn();

        Storage::fake('photos');

        $this->storeEntity([
            'name'      => 'test',
            'status'    => 1,
            'thumbnail' => UploadedFile::fake()->image('test.jpg'),
        ])
            ->assertRedirect(route($this->index_route));
    }

    /** @test */
    public function create_brand_requires_name_status_thumbnail()
    {
        $this->signIn();

        $this->storeEntity()
            ->assertSessionHasErrors(['name', 'status', 'thumbnail']);
    }
}
