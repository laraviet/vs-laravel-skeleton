<?php

namespace Modules\Payment\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Payment\Entities\Traits\Attribute\PaymentAttribute;
use Modules\Payment\Entities\Traits\Method\PaymentMethod;
use Modules\Payment\Entities\Traits\Relationship\PaymentRelationship;
use Modules\Payment\Entities\Traits\Scope\PaymentScope;

class Payment extends Model
{
    use PaymentScope, PaymentRelationship, SoftDeletes;
    use PaymentMethod, PaymentAttribute;

    const STATUS_PENDING = 0;
    const STATUS_PAID = 1;

    protected $table = 'payments';
    protected $fillable = [
        'order_id', 'status', 'price', 'comment'
    ];
}
