<?php

namespace Modules\Blog\Tests\Feature;

use Modules\Core\Tests\TestCase;

class CreateBlogTagsTest extends TestCase
{
    private function accessCreateTagForm()
    {
        return $this->get(route('blog-tags.create'));
    }

    private function storeTag($overrides = [])
    {
        return $this->post(route('blog-tags.store'), $overrides);
    }

    /** @test */
    public function unauthenticated_users_can_not_access_create_form()
    {
        $this->accessCreateTagForm()
            ->assertRedirect(self::LOGIN_URL);
    }

    /** @test */
    public function authenticated_users_can_access_create_form()
    {
        $this->signIn();

        $this->accessCreateTagForm()
            ->assertStatus(200);
    }

    /** @test */
    public function unauthenticated_users_can_not_create_new_tag()
    {
        $this->storeTag()
            ->assertRedirect(self::LOGIN_URL);
    }

    /** @test */
    public function authenticated_users_can_create_new_tag()
    {
        $this->signIn();

        $this->storeTag([
            'name'   => 'test',
            'status' => 1,
        ])
            ->assertRedirect(route('blog-tags.index'));
    }

    /** @test */
    public function tag_requires_name_and_status()
    {
        $this->signIn();

        $this->storeTag()
            ->assertSessionHasErrors(['name', 'status']);
    }
}
