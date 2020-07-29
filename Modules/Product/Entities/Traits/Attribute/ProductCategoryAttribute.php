<?php

namespace Modules\Product\Entities\Traits\Attribute;

use Modules\Core\Entities\Traits\BaseImageProcess;

trait ProductCategoryAttribute
{
    use BaseImageProcess;

    public function getStatusNameAttribute()
    {
        return self::statuses()[ $this->status ];
    }

    public function getThumbnailAttribute()
    {
        return $this->getImagePath('noImage', self::THUMBNAIL);
    }
}
