<?php

namespace Modules\Blog\Tests\Feature;

use Modules\Blog\Entities\BlogTag;
use Modules\Blog\Tests\Base\BaseBlogTagsTest;
use Modules\Core\Tests\Concerns\ReadEntityTest;

class ReadBlogTagsTest extends BaseBlogTagsTest
{
    use ReadEntityTest;

    /** @test */
    public function blog_tag_can_be_searched_by_name()
    {
        $this->signIn();
        $otherTag = create(BlogTag::class);

        $this->accessEntityList(['filter[search]' => $this->entity->name])
            ->assertSee($this->entity->name)
            ->assertDontSee($otherTag->name);
    }
}
