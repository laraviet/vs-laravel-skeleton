<?php

namespace Modules\Blog\Tests\Feature;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Modules\Blog\Entities\BlogCategory;
use Modules\Blog\Tests\Base\BaseBlogPostsTest;
use Modules\Core\Tests\Concerns\CreateEntityTest;

class CreateBlogPostsTest extends BaseBlogPostsTest
{
    use CreateEntityTest;

    /** @test */
    public function authenticated_users_can_create_blog_post()
    {
        $this->signIn();

        $category = create(BlogCategory::class, ['parent_id' => null]);

        Storage::fake('photos');

        $this->storeEntity([
            localize_field('title')   => 'test',
            localize_field('content') => 'test test test',
            'status'                  => 1,
            'categories'              => [$category->id],
            'feature_image'           => UploadedFile::fake()->image('test.jpg')
        ])
            ->assertRedirect(route($this->index_route));
    }

    /** @test */
    public function create_blog_post_requires_title_content_status_categories_feature_image()
    {
        $this->signIn();

        $this->storeEntity()
            ->assertSessionHasErrors([
                localize_field('title'),
                localize_field('content'),
                'status',
                'categories',
                'feature_image'
            ]);
    }
}
