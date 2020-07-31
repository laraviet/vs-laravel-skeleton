<?php

namespace Modules\Product\Tests\Feature;

use Modules\Core\Tests\Concerns\CreateEntityTest;
use Modules\Product\Tests\Base\BaseProductTagsTest;

class CreateProductTagsTest extends BaseProductTagsTest
{
    use CreateEntityTest;

    /** @test */
    public function authenticated_users_can_create_new_product_tag()
    {
        $this->signIn();


        $this->storeEntity([
            'name'   => 'test',
            'status' => 1,
        ])
            ->assertRedirect(route($this->index_route));
    }

    /** @test */
    public function create_product_tag_requires_name_status_thumbnail()
    {
        $this->signIn();

        $this->storeEntity()
            ->assertSessionHasErrors(['name', 'status']);
    }
}
