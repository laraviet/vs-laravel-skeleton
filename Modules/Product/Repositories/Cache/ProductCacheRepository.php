<?php

namespace Modules\Product\Repositories\Cache;

use Illuminate\Cache\CacheManager;
use Modules\Core\Repositories\Cache\BaseCacheRepository;
use Modules\Product\Entities\Product;
use Modules\Product\Repositories\Contracts\ProductRepositoryInterface;
use Modules\Product\Repositories\ProductRepository;

class ProductCacheRepository extends BaseCacheRepository implements ProductRepositoryInterface
{
    /**
     * ProductCategoryCacheRepository constructor.
     * @param Product $product
     * @param CacheManager $cache
     * @param ProductRepository $productRepository
     */
    public function __construct(Product $product, CacheManager $cache, ProductRepository $productRepository)
    {
        $this->model = $product;
        $this->cache = $cache;
        parent::__construct($productRepository);
    }
}
