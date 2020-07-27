<?php

namespace Modules\Product\Entities\Traits\Methods;

trait ProductTagMethod
{
    public static function statuses()
    {
        return activeInactiveStatuses();
    }
}
