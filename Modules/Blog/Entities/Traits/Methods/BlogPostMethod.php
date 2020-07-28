<?php

namespace Modules\Blog\Entities\Traits\Methods;

trait BlogPostMethod
{
    public static function statuses()
    {
        return [
            '0' => _t('draft'),
            '1' => _t('publish'),
        ];
    }
}
