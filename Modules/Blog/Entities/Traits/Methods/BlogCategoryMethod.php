<?php

namespace Modules\Blog\Entities\Traits\Methods;

trait BlogCategoryMethod
{
    public static function statuses()
    {
        return activeInactiveStatuses();
    }
}
