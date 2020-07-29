<?php

namespace Modules\Product\Entities\Traits\Attribute;

use Modules\Core\Entities\Traits\BaseImageProcess;

trait ProductAttribute
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

    public function getDetailImagesAttribute()
    {
        return $this->getImages(self::DETAIL_IMAGE);
    }
}
