<?php

namespace Modules\Product\Tests\Feature;

use Modules\Core\Tests\Concerns\UpdateEntityTest;
use Modules\Product\Tests\Base\BaseBrandsTest;

class UpdateBrandsTest extends BaseBrandsTest
{
    use UpdateEntityTest;

    /** @test */
    public function authenticated_users_can_update_brand()
    {
        $this->signIn();

        $this->updateEntity([
            'name'   => 'test',
            'status' => 1,
        ])->assertRedirect(route($this->index_route));

        tap($this->entity->refresh(), function ($brand) {
            $this->assertEquals('test', $brand->name);
            $this->assertEquals(1, $brand->status);
        });
    }

    /** @test */
    public function update_brand_requires_name_and_status()
    {
        $this->signIn();

        $this->updateEntity()
            ->assertSessionHasErrors(['name', 'status']);
    }
}
