<?php

namespace Modules\Blog\Tests\Feature;

use Modules\Blog\Entities\BlogCategory;
use Modules\Blog\Tests\Base\BaseBlogPostsTest;
use Modules\Core\Tests\Concerns\UpdateEntityTest;

class UpdateBlogPostsTest extends BaseBlogPostsTest
{
    use UpdateEntityTest;

    /** @test */
    public function authenticated_users_can_update_blog_post()
    {
        $this->withoutExceptionHandling();
        $this->signIn();

        $category = create(BlogCategory::class, ['parent_id' => null]);

        $this->updateEntity([
            localize_field('title')   => 'test',
            localize_field('content') => 'test test test',
            'status'                  => 1,
            'categories'              => [$category->id],
        ])->assertRedirect(route($this->index_route));

        tap($this->entity->fresh(), function ($post) use ($category) {
            $this->assertEquals('test', $post->title);
            $this->assertEquals('test test test', $post->content);
            $this->assertEquals(1, $post->status);
            $this->assertTrue($post->categories->contains($category));
        });
    }

    /** @test */
    public function update_blog_post_requires__title_content_status_categories_feature_image()
    {
        $this->signIn();

        $this->updateEntity()
            ->assertSessionHasErrors([
                localize_field('title'),
                localize_field('content'),
                'status',
                'categories'
            ]);
    }
}
