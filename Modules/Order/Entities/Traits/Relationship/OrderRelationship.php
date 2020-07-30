<?php

namespace Modules\Order\Entities\Traits\Relationship;

use Modules\Core\Entities\User;
use Modules\Order\Entities\OrderItem;

trait OrderRelationship
{
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function orderBy()
    {
        return $this->belongsTo(User::class);
    }
}
