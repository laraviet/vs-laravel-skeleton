<?php

namespace Modules\Order\Repositories;

use Modules\Core\Repositories\BaseRepository;
use Modules\Order\Entities\OrderItem;
use Modules\Order\Repositories\Contracts\OrderItemRepositoryInterface;

class OrderItemRepository extends BaseRepository implements OrderItemRepositoryInterface
{
    /**
     * OrderItemRepository constructor.
     * @param OrderItem $orderItem
     */
    public function __construct(OrderItem $orderItem)
    {
        $this->model = $orderItem;
    }
}
