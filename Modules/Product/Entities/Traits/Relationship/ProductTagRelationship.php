<?php

namespace Modules\Product\Entities\Traits\Relationship;

use Modules\Product\Entities\Product;

trait ProductTagRelationship
{
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_tag_pivot', 'product_tag_id', 'product_id');
    }
}
