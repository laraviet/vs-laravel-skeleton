<?php

namespace Modules\Order\Repositories;

use Modules\Core\Repositories\BaseRepository;
use Modules\Order\Entities\Order;
use Modules\Order\Repositories\Contracts\OrderRepositoryInterface;

class OrderRepository extends BaseRepository implements OrderRepositoryInterface
{
    /**
     * OrderRepository constructor.
     * @param Order $order
     */
    public function __construct(Order $order)
    {
        $this->model = $order;
    }
}
