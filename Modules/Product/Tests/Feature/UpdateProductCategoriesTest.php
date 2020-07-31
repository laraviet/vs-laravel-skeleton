<?php

namespace Modules\Product\Tests\Feature;

use Modules\Core\Tests\Concerns\UpdateEntityTest;
use Modules\Product\Tests\Base\BaseProductCategoriesTest;

class UpdateProductCategoriesTest extends BaseProductCategoriesTest
{
    use UpdateEntityTest;

    /** @test */
    public function authenticated_users_can_update_product_category()
    {
        $this->signIn();

        $this->updateEntity([
            localize_field('name')        => 'test',
            localize_field('description') => 'test description',
            'parent_id'                   => 0,
            'status'                      => 1,
        ])->assertRedirect(route($this->index_route));

        tap($this->entity->refresh(), function ($category) {
            $this->assertEquals('test', $category->name);
            $this->assertEquals('test description', $category->description);
            $this->assertEquals(1, $category->status);
        });
    }

    /** @test */
    public function update_product_category_requires_name_description_parent_id_status()
    {
        $this->signIn();

        $this->updateEntity()
            ->assertSessionHasErrors([
                localize_field('name'),
                localize_field('description'),
                'parent_id',
                'status',
            ]);
    }
}
