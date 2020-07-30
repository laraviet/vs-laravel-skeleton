<?php

namespace Modules\Blog\Tests\Unit;

use Modules\Blog\Entities\BlogTag;
use Modules\Core\Tests\TestCase;

class BlogTagsTest extends TestCase
{
    protected $tag;

    protected function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->tag = create(BlogTag::class);
    }

    /** @test */
    public function blog_tag_has_status()
    {
        $this->assertCount(2, $this->tag->statuses());
    }

    /** @test */
    public function blog_tag_has_statusName()
    {
        $this->assertTrue(is_string($this->tag->statusName));
    }
}
