<?php

namespace Modules\Order\Repositories\Cache;

use Illuminate\Cache\CacheManager;
use Modules\Core\Repositories\Cache\BaseCacheRepository;
use Modules\Order\Entities\Order;
use Modules\Order\Repositories\Contracts\OrderRepositoryInterface;
use Modules\Order\Repositories\OrderRepository;

class OrderCacheRepository extends BaseCacheRepository implements OrderRepositoryInterface
{
    /**
     * ProductCategoryCacheRepository constructor.
     * @param Order $order
     * @param CacheManager $cache
     * @param OrderRepository $orderRepository
     */
    public function __construct(Order $order, CacheManager $cache, OrderRepository $orderRepository)
    {
        $this->model = $order;
        $this->cache = $cache;
        parent::__construct($orderRepository);
    }
}
