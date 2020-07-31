<?php

namespace Modules\Product\Tests\Feature;

use Modules\Core\Tests\Concerns\ReadEntityTest;
use Modules\Product\Entities\ProductTag;
use Modules\Product\Tests\Base\BaseProductTagsTest;

class ReadProductTagsTest extends BaseProductTagsTest
{
    use ReadEntityTest;

    /** @test */
    public function product_tag_can_be_searched_by_name()
    {
        $this->signIn();
        $otherTag = create(ProductTag::class);

        $this->accessEntityList(['filter[search]' => $this->entity->name])
            ->assertSee($this->entity->name)
            ->assertDontSee($otherTag->name);
    }
}
