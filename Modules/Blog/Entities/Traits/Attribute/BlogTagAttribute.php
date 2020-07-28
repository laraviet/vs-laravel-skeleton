<?php

namespace Modules\Blog\Entities\Traits\Attribute;

trait BlogTagAttribute
{
    public function getStatusNameAttribute()
    {
        return self::statuses()[ $this->status ];
    }
}
