<?php

namespace Modules\Blog\Repositories\Cache;

use Illuminate\Cache\CacheManager;
use Modules\Blog\Entities\BlogTag;
use Modules\Blog\Repositories\BlogTagRepository;
use Modules\Blog\Repositories\Contracts\BlogTagRepositoryInterface;
use Modules\Core\Repositories\Cache\BaseCacheRepository;

class BlogTagCacheRepository extends BaseCacheRepository implements BlogTagRepositoryInterface
{
    /**
     * ProductCategoryCacheRepository constructor.
     * @param BlogTag $blogTag
     * @param CacheManager $cache
     * @param BlogTagRepository $blogTagRepository
     */
    public function __construct(BlogTag $blogTag, CacheManager $cache, BlogTagRepository $blogTagRepository)
    {
        $this->model = $blogTag;
        $this->cache = $cache;
        parent::__construct($blogTagRepository);
    }
}
