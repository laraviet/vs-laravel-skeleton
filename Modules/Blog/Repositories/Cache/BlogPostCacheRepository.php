<?php

namespace Modules\Blog\Repositories\Cache;

use Illuminate\Cache\CacheManager;
use Modules\Blog\Entities\BlogPost;
use Modules\Blog\Repositories\BlogPostRepository;
use Modules\Blog\Repositories\Contracts\BlogPostRepositoryInterface;
use Modules\Core\Repositories\Cache\BaseCacheRepository;

class BlogPostCacheRepository extends BaseCacheRepository implements BlogPostRepositoryInterface
{
    /**
     * ProductCategoryCacheRepository constructor.
     * @param BlogPost $blogPost
     * @param CacheManager $cache
     * @param BlogPostRepository $blogPostRepository
     */
    public function __construct(BlogPost $blogPost, CacheManager $cache, BlogPostRepository $blogPostRepository)
    {
        $this->model = $blogPost;
        $this->cache = $cache;
        parent::__construct($blogPostRepository);
    }
}
