<?php

namespace Modules\Blog\Repositories\Cache;

use Illuminate\Cache\CacheManager;
use Modules\Blog\Entities\BlogCategory;
use Modules\Blog\Repositories\BlogCategoryRepository;
use Modules\Blog\Repositories\Contracts\BlogCategoryRepositoryInterface;
use Modules\Core\Repositories\Cache\BaseCacheRepository;

class BlogCategoryCacheRepository extends BaseCacheRepository implements BlogCategoryRepositoryInterface
{
    /**
     * ProductCategoryCacheRepository constructor.
     * @param BlogCategory $blogCategory
     * @param CacheManager $cache
     * @param BlogCategoryRepository $blogCategoryRepository
     */
    public function __construct(BlogCategory $blogCategory, CacheManager $cache, BlogCategoryRepository $blogCategoryRepository)
    {
        $this->model = $blogCategory;
        $this->cache = $cache;
        parent::__construct($blogCategoryRepository);
    }
}
