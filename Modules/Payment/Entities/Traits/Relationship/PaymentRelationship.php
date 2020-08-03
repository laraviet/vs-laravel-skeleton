<?php


namespace Modules\Payment\Entities\Traits\Relationship;

use Modules\Order\Entities\Order;

trait PaymentRelationship
{
    /**
     * @return mixed
     */
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
