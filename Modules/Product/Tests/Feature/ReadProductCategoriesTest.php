<?php

namespace Modules\Product\Tests\Feature;

use Modules\Core\Tests\Concerns\ReadEntityTest;
use Modules\Product\Entities\ProductCategory;
use Modules\Product\Tests\Base\BaseProductCategoriesTest;

class ReadProductCategoriesTest extends BaseProductCategoriesTest
{
    use ReadEntityTest;

    /** @test */
    public function product_category_can_be_searched_by_name()
    {
        $this->signIn();
        $otherCategory = create(ProductCategory::class);

        $this->accessEntityList(['filter[search]' => $this->entity->name])
            ->assertSee($this->entity->name)
            ->assertDontSee($otherCategory->name);
    }
}
