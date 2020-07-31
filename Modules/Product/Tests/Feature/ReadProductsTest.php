<?php

namespace Modules\Product\Tests\Feature;

use Modules\Core\Tests\Concerns\ReadEntityTest;
use Modules\Product\Entities\Product;
use Modules\Product\Tests\Base\BaseProductsTest;

class ReadProductsTest extends BaseProductsTest
{
    use ReadEntityTest;

    /** @test */
    public function product_can_be_searched_by_name()
    {
        $this->signIn();
        $otherProduct = create(Product::class);

        $this->accessEntityList(['filter[search]' => $this->entity->name])
            ->assertSee($this->entity->name)
            ->assertDontSee($otherProduct->name);
    }
}
