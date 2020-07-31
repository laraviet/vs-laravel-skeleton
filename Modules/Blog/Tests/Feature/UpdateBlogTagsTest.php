<?php

namespace Modules\Blog\Tests\Feature;

use Modules\Blog\Tests\Base\BaseBlogTagsTest;
use Modules\Core\Tests\Concerns\UpdateEntityTest;

class UpdateBlogTagsTest extends BaseBlogTagsTest
{
    use UpdateEntityTest;

    /** @test */
    public function authenticated_users_can_update_tag()
    {
        $this->signIn();

        $this->updateEntity([
            'name'   => 'name test',
            'status' => 1,
        ])->assertRedirect(route($this->index_route));

        tap($this->entity->refresh(), function ($tag) {
            $this->assertEquals('name test', $tag->name);
            $this->assertEquals(1, $tag->status);
        });
    }

    /** @test */
    public function update_tag_requires_name_and_status()
    {
        $this->signIn();

        $this->updateEntity()
            ->assertSessionHasErrors(['name', 'status']);
    }
}
