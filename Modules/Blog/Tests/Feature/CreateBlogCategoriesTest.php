<?php

namespace Modules\Blog\Tests\Feature;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Modules\Core\Tests\TestCase;

class CreateBlogCategoriesTest extends TestCase
{
    private function accessCreateCategoryForm()
    {
        return $this->get(route('blog-categories.create'));
    }

    private function storeBlogCategory($overrides = [])
    {
        return $this->post(route('blog-categories.store'), $overrides);
    }

    /** @test */
    public function unauthenticated_users_can_not_access_create_blog_categories_form()
    {
        $this->accessCreateCategoryForm()
            ->assertRedirect(self::LOGIN_URL);
    }

    /** @test */
    public function authenticated_users_can_access_create_blog_categories_form()
    {
        $this->signIn();

        $this->accessCreateCategoryForm()
            ->assertStatus(200);
    }

    /** @test */
    public function unauthenticated_users_can_not_store_blog_categories()
    {
        $this->storeBlogCategory()
            ->assertRedirect(self::LOGIN_URL);
    }

    /** @test */
    public function authenticated_users_can_store_blog_categories()
    {
        $this->withoutExceptionHandling();
        $this->signIn();

        Storage::fake('photos');

        $this->storeBlogCategory([
            localize_field('name') => 'test',
            'status'               => 1,
            'parent_id'            => 0,
            'thumbnail'            => UploadedFile::fake()->image('test.jpg')
        ])
            ->assertRedirect(route('blog-categories.index'));
    }

    /** @test */
    public function create_blog_categories_requires_name_and_status_and_thumbnail()
    {
        $this->signIn();

        $this->storeBlogCategory()
            ->assertSessionHasErrors([localize_field('name'), 'status', 'thumbnail', 'parent_id']);
    }
}
