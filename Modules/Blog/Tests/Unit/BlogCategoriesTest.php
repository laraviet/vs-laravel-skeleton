<?php

namespace Modules\Blog\Tests\Unit;

use Modules\Blog\Entities\BlogCategory;
use Modules\Blog\Entities\BlogPost;
use Modules\Blog\Tests\Base\BaseBlogCategoriesTest;

class BlogCategoriesTest extends BaseBlogCategoriesTest
{
    /** @test */
    public function blog_category_has_parent()
    {
        $childCategory = create(BlogCategory::class, ['parent_id' => $this->entity]);
        $this->assertInstanceOf(BlogCategory::class, $childCategory->parent);
        $this->assertEquals($this->entity->id, $childCategory->parent->id);
        $this->assertEquals($this->entity->name, $childCategory->parent->name);
    }

    /** @test */
    public function blog_category_has_many_posts()
    {
        $posts = create(BlogPost::class, [], 10);
        foreach ($posts as $post) {
            \DB::table('blog_category_post_pivot')->insert([
                'blog_category_id' => $this->entity->id,
                'blog_post_id'     => $post->id
            ]);
        }

        $this->assertCount(10, $this->entity->posts);
        foreach ($posts as $post) {
            $this->assertTrue($this->entity->posts->contains($post));
        }
    }

    /** @test */
    public function blog_category_has_statuses()
    {
        $this->assertCount(2, $this->entity->statuses());
    }

    /** @test */
    public function blog_category_has_statusName()
    {
        $this->assertTrue(is_string($this->entity->statusName));
    }
}
