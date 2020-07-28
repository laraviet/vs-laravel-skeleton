<?php

namespace Modules\Blog\Repositories;

use Modules\Blog\Entities\BlogTag;
use Modules\Blog\Repositories\Contracts\BlogTagRepositoryInterface;
use Modules\Core\Repositories\BaseRepository;

class BlogTagRepository extends BaseRepository implements BlogTagRepositoryInterface
{
    /**
     * ProductCategoryRepository constructor.
     * @param BlogTag $blogTag
     */
    public function __construct(BlogTag $blogTag)
    {
        $this->model = $blogTag;
    }
}
