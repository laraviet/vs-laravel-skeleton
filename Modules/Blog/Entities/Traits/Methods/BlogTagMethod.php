<?php

namespace Modules\Blog\Entities\Traits\Methods;

trait BlogTagMethod
{
    public static function statuses()
    {
        return activeInactiveStatuses();
    }
}
