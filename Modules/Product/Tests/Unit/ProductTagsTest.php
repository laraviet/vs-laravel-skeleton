<?php

namespace Modules\Product\Tests\Unit;

use Modules\Product\Tests\Base\BaseProductTagsTest;

class ProductTagsTest extends BaseProductTagsTest
{
    /** @test */
    public function product_tag_has_status()
    {
        $this->assertCount(2, $this->entity->statuses());
    }

    /** @test */
    public function product_tag_has_statusName()
    {
        $this->assertTrue(is_string($this->entity->statusName));
    }
}
