<?php

namespace Modules\Blog\Tests\Unit;

use Modules\Blog\Entities\BlogCategory;
use Modules\Blog\Tests\Base\BaseBlogPostsTest;

class BlogPostsTest extends BaseBlogPostsTest
{
    /** @test */
    public function blog_post_has_categories()
    {
        $categories = create(BlogCategory::class, ['parent_id' => null], 10);

        foreach ($categories as $category) {
            \DB::table('blog_category_post_pivot')->insert([
                'blog_category_id' => $category->id,
                'blog_post_id'     => $this->entity->id
            ]);
        }

        $this->assertCount(10, $this->entity->categories);
        foreach ($categories as $category) {
            $this->assertTrue($this->entity->categories->contains($category));
        }
    }

    /** @test */
    public function blog_post_has_statuses()
    {
        $this->assertCount(2, $this->entity->statuses());
    }

    /** @test */
    public function blog_post_has_statusName()
    {
        $this->assertTrue(is_string($this->entity->statusName));
    }
}
