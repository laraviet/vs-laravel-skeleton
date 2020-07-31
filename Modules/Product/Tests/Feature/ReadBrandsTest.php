<?php

namespace Modules\Product\Tests\Feature;

use Modules\Core\Tests\Concerns\ReadEntityTest;
use Modules\Product\Entities\Brand;
use Modules\Product\Tests\Base\BaseBrandsTest;

class ReadBrandsTest extends BaseBrandsTest
{
    use ReadEntityTest;

    /** @test */
    public function brand_can_be_searched_by_name()
    {
        $this->signIn();
        $otherBrand = create(Brand::class);

        $this->accessEntityList(['filter[search]' => $this->entity->name])
            ->assertSee($this->entity->name)
            ->assertDontSee($otherBrand->name);
    }
}
