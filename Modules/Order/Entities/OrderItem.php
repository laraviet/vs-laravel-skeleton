<?php

namespace Modules\Order\Entities;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;
use Modules\Order\Entities\Traits\Relationship\OrderItemRelationship;

class OrderItem extends Model
{
    use Cachable;
    use OrderItemRelationship;

    protected $fillable = ['order_id', 'product_id', 'quantity', 'unit_price', 'total'];
}
