<?php

namespace Modules\Blog\Tests\Feature;

use Modules\Blog\Tests\Base\BaseBlogTagsTest;
use Modules\Core\Tests\Concerns\CreateEntityTest;

class CreateBlogTagsTest extends BaseBlogTagsTest
{
    use CreateEntityTest;

    /** @test */
    public function authenticated_users_can_create_new_tag()
    {
        $this->signIn();

        $this->storeEntity([
            'name'   => 'test',
            'status' => 1,
        ])
            ->assertRedirect(route($this->index_route));
    }

    /** @test */
    public function tag_requires_name_and_status()
    {
        $this->signIn();

        $this->storeEntity()
            ->assertSessionHasErrors(['name', 'status']);
    }
}
