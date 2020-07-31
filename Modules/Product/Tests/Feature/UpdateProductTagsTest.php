<?php

namespace Modules\Product\Tests\Feature;

use Modules\Core\Tests\Concerns\UpdateEntityTest;
use Modules\Product\Tests\Base\BaseProductTagsTest;

class UpdateProductTagsTest extends BaseProductTagsTest
{
    use UpdateEntityTest;

    /** @test */
    public function authenticated_users_can_update_product_tag()
    {
        $this->signIn();

        $this->updateEntity([
            'name'   => 'test',
            'status' => 1,
        ])->assertRedirect(route($this->index_route));

        tap($this->entity->refresh(), function ($tag) {
            $this->assertEquals('test', $tag->name);
            $this->assertEquals(1, $tag->status);
        });
    }

    /** @test */
    public function update_product_tag_requires_name_and_status()
    {
        $this->signIn();

        $this->updateEntity()
            ->assertSessionHasErrors(['name', 'status']);
    }
}
