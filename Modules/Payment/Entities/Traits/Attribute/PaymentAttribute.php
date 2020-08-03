<?php

namespace Modules\Payment\Entities\Traits\Attribute;

trait PaymentAttribute
{
    public function getStatusNameAttribute()
    {
        return self::statuses()[ $this->status ];
    }
}
