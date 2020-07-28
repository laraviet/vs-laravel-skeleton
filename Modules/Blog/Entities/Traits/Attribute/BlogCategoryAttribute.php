<?php

namespace Modules\Blog\Entities\Traits\Attribute;

use Modules\Core\Entities\Traits\BaseImageProcess;

trait BlogCategoryAttribute
{
    use BaseImageProcess;

    public function getStatusNameAttribute()
    {
        return self::statuses()[ $this->status ];
    }

    public function getThumbnailAttribute()
    {
        return $this->getImage('noImage', self::THUMBNAIL);
    }
}
