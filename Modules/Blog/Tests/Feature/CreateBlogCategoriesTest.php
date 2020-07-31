<?php

namespace Modules\Blog\Tests\Feature;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Modules\Blog\Tests\Base\BaseBlogCategoriesTest;
use Modules\Core\Tests\Concerns\CreateEntityTest;

class CreateBlogCategoriesTest extends BaseBlogCategoriesTest
{
    use CreateEntityTest;

    /** @test */
    public function authenticated_users_can_store_blog_categories()
    {
        $this->withoutExceptionHandling();
        $this->signIn();

        Storage::fake('photos');

        $this->storeEntity([
            localize_field('name') => 'test',
            'status'               => 1,
            'parent_id'            => 0,
            'thumbnail'            => UploadedFile::fake()->image('test.jpg')
        ])
            ->assertRedirect(route($this->index_route));
    }

    /** @test */
    public function create_blog_categories_requires_name_and_status_and_thumbnail()
    {
        $this->signIn();

        $this->storeEntity()
            ->assertSessionHasErrors([localize_field('name'), 'status', 'thumbnail', 'parent_id']);
    }
}
