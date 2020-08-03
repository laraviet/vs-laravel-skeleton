<?php

namespace Modules\Order\Entities\Traits\Attribute;

trait OrderAttribute
{
    public function getStatusNameAttribute()
    {
        return self::statuses()[ $this->status ];
    }
}
