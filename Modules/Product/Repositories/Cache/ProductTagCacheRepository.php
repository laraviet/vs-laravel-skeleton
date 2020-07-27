<?php

namespace Modules\Product\Repositories\Cache;

use Illuminate\Cache\CacheManager;
use Modules\Core\Repositories\Cache\BaseCacheRepository;
use Modules\Product\Entities\ProductTag;
use Modules\Product\Repositories\Contracts\ProductTagRepositoryInterface;
use Modules\Product\Repositories\ProductTagRepository;

class ProductTagCacheRepository extends BaseCacheRepository implements ProductTagRepositoryInterface
{
    /**
     * ProductCategoryCacheRepository constructor.
     * @param ProductTag $productTag
     * @param CacheManager $cache
     * @param ProductTagRepository $productTagRepository
     */
    public function __construct(ProductTag $productTag, CacheManager $cache, ProductTagRepository $productTagRepository)
    {
        $this->model = $productTag;
        $this->cache = $cache;
        parent::__construct($productTagRepository);
    }
}
