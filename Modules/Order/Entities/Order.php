<?php

namespace Modules\Order\Entities;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;
use Modules\Order\Entities\Traits\Attribute\OrderAttribute;
use Modules\Order\Entities\Traits\Methods\OrderMethod;
use Modules\Order\Entities\Traits\Relationship\OrderRelationship;

class Order extends Model
{
    use Cachable;
    use OrderRelationship, OrderMethod, OrderAttribute;

    const STATUS_PENDING = 0;
    const STATUS_PROCESSING = 1;
    const STATUS_SUBMITTED = 2;
    const STATUS_CANCELED = 3;
    const STATUS_COMPLETED = 4;

    protected $fillable = ['order_number', 'order_by', 'amount'];
}
