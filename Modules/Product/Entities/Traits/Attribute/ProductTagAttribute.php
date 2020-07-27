<?php

namespace Modules\Product\Entities\Traits\Attribute;

trait ProductTagAttribute
{
    public function getStatusNameAttribute()
    {
        return self::statuses()[ $this->status ];
    }
}
