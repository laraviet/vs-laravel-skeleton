<?php

namespace Modules\Order\Entities\Traits\Relationship;

use Modules\Order\Entities\Order;
use Modules\Product\Entities\Product;

trait OrderItemRelationship
{
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
