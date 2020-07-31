<?php

namespace Modules\Blog\Tests\Feature;

use Modules\Blog\Entities\BlogPost;
use Modules\Blog\Tests\Base\BaseBlogPostsTest;
use Modules\Core\Tests\Concerns\ReadEntityTest;

class ReadBlogPostsTest extends BaseBlogPostsTest
{
    use ReadEntityTest;

    /** @test */
    public function blog_posts_can_be_searched_by_title()
    {
        $this->signIn();

        $otherPost = create(BlogPost::class);

        $this->accessEntityList(['filter[search]' => $this->entity->title])
            ->assertSee($this->entity->title)
            ->assertDontSee($otherPost->title);
    }
}
