<?php

namespace Modules\Product\Entities\Traits\Relationship;

use Modules\Product\Entities\Brand;

trait ProductRelationship
{
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
