<?php

namespace Modules\Blog\Tests\Feature;

use Modules\Blog\Entities\BlogCategory;
use Modules\Blog\Tests\Base\BaseBlogCategoriesTest;
use Modules\Core\Tests\Concerns\ReadEntityTest;

class ReadBlogCategoriesTest extends BaseBlogCategoriesTest
{
    use ReadEntityTest;

    /** @test */
    public function blog_categories_can_be_searched_by_name()
    {
        $this->signIn();
        $otherCategory = create(BlogCategory::class, ['parent_id' => null]);

        $this->accessEntityList([
            'filter[search]' => $this->entity->name
        ])
            ->assertSee($this->entity->name)
            ->assertDontSee($otherCategory->name);
    }
}
