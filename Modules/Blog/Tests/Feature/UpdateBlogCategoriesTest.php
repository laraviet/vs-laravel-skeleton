<?php

namespace Modules\Blog\Tests\Feature;

use Modules\Blog\Tests\Base\BaseBlogCategoriesTest;
use Modules\Core\Tests\Concerns\UpdateEntityTest;

class UpdateBlogCategoriesTest extends BaseBlogCategoriesTest
{
    use UpdateEntityTest;

    /** @test */
    public function authenticated_users_can_update_blog_category()
    {
        $this->withoutExceptionHandling();
        $this->signIn();

        $this->updateEntity([
            localize_field('name') => 'updated',
            'status'               => 1,
            'parent_id'            => 0,
        ])->assertRedirect(route($this->index_route));

        tap($this->entity->fresh(), function ($category) {
            $this->assertEquals('updated', $category->name);
            $this->assertEquals(1, $category->status);
        });
    }

    /** @test */
    public function update_blog_category_requires_name_and_status_and_parent_id()
    {
        $this->signIn();

        $this->updateEntity()
            ->assertSessionHasErrors([localize_field('name'), 'status', 'parent_id']);
    }
}
