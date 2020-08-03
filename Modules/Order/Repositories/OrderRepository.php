<?php

namespace Modules\Order\Repositories;

use Illuminate\Database\Eloquent\Model;
use Modules\Core\Repositories\BaseRepository;
use Modules\Order\Entities\Order;
use Modules\Order\Repositories\Contracts\OrderItemRepositoryInterface;
use Modules\Order\Repositories\Contracts\OrderRepositoryInterface;

class OrderRepository extends BaseRepository implements OrderRepositoryInterface
{
    /**
     * @var OrderItemRepositoryInterface
     */
    private $orderItemRepository;

    /**
     * OrderRepository constructor.
     * @param Order $order
     * @param OrderItemRepositoryInterface $orderItemRepository
     */
    public function __construct(Order $order, OrderItemRepositoryInterface $orderItemRepository)
    {
        $this->model = $order;
        $this->orderItemRepository = $orderItemRepository;
    }

    /**
     * @inheritDoc
     */
    public function create(array $attributes): Model
    {
        $amount = 0;
        foreach ($attributes['products'] as $product) {
            $amount += $product->unit_price * $product->quantity;
        }
        $order_info = [
            'order_by' => $attributes['order_by'],
            'amount'   => $amount,
        ];

        $order = parent::create($order_info);
        $order->order_number = $order->genOrderNumber();
        $order->save();

        foreach ($attributes['products'] as $product) {
            $order_item_info = [
                'order_id'   => $order->id,
                'product_id' => $product->id,
                'quantity'   => $product->quantity,
                'unit_price' => $product->unit_price,
                'total'      => $product->quantity * $product->unit_price,
            ];

            $this->orderItemRepository->create($order_item_info);
        }

        return $order;
    }

    /**
     * @inheritDoc
     */
    public function updateById($id, array $attributes): Model
    {
        $model = $this->findById($id);
        $amount = 0;

        foreach ($attributes as $id => $product) {
            $total = $product['quantity'] * $product['unit_price'];
            $this->orderItemRepository->updateById($id, [
                'unit_price' => $product['unit_price'],
                'quantity'   => $product['quantity'],
                'total'      => $total,
            ]);
            $amount += $total;
        }

        if ($model->amount != $amount) {
            $model->amount = $amount;
            $model->save();
        }

        return $model;
    }
}
