<?php

namespace Modules\Order\Repositories\Cache;

use Illuminate\Cache\CacheManager;
use Modules\Core\Repositories\Cache\BaseCacheRepository;
use Modules\Order\Entities\OrderItem;
use Modules\Order\Repositories\Contracts\OrderItemRepositoryInterface;
use Modules\Order\Repositories\OrderItemRepository;

class OrderItemCacheRepository extends BaseCacheRepository implements OrderItemRepositoryInterface
{
    /**
     * ProductCategoryCacheRepository constructor.
     * @param OrderItem $orderItem
     * @param CacheManager $cache
     * @param OrderItemRepository $orderItemRepository
     */
    public function __construct(OrderItem $orderItem, CacheManager $cache, OrderItemRepository $orderItemRepository)
    {
        $this->model = $orderItem;
        $this->cache = $cache;
        parent::__construct($orderItemRepository);
    }
}
