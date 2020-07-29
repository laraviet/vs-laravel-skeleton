<?php

namespace Modules\Blog\Entities\Traits\Attribute;

use Modules\Core\Entities\Traits\BaseImageProcess;

trait BlogPostAttribute
{
    use BaseImageProcess;

    public function getStatusNameAttribute()
    {
        return self::statuses()[ $this->status ];
    }

    public function getFeatureImageAttribute()
    {
        return $this->getImagePath('noImage', self::FEATURE_IMAGE);
    }
}
