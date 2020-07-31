<?php

namespace Modules\Blog\Tests\Unit;

use Modules\Blog\Tests\Base\BaseBlogTagsTest;

class BlogTagsTest extends BaseBlogTagsTest
{
    /** @test */
    public function blog_tag_has_status()
    {
        $this->assertCount(2, $this->entity->statuses());
    }

    /** @test */
    public function blog_tag_has_statusName()
    {
        $this->assertTrue(is_string($this->entity->statusName));
    }
}
