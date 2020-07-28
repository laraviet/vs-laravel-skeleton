<?php

namespace Modules\Product\Entities\Traits\Relationship;

use Modules\Product\Entities\Brand;
use Modules\Product\Entities\ProductCategory;
use Modules\Product\Entities\ProductTag;

trait ProductRelationship
{
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function categories()
    {
        return $this->belongsToMany(ProductCategory::class, 'product_category_pivot', 'product_id', 'product_category_id');
    }

    public function tags()
    {
        return $this->belongsToMany(ProductTag::class, 'product_tag_pivot', 'product_id', 'product_tag_id');
    }
}
