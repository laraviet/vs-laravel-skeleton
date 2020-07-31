<?php

namespace Modules\Product\Tests\Unit;

use Modules\Product\Tests\Base\BaseBrandsTest;

class BrandsTest extends BaseBrandsTest
{
    /** @test */
    public function brand_has_status()
    {
        $this->assertCount(2, $this->entity->statuses());
    }

    /** @test */
    public function brand_has_statusName()
    {
        $this->assertTrue(is_string($this->entity->statusName));
    }
}
