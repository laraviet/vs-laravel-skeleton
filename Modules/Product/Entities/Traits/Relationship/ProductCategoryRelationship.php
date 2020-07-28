<?php

namespace Modules\Product\Entities\Traits\Relationship;

use Modules\Product\Entities\Product;
use Modules\Product\Entities\ProductCategory;

trait ProductCategoryRelationship
{
    public function parent()
    {
        return $this->belongsTo(ProductCategory::class, 'parent_id', 'id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_category_pivot', 'product_category_id', 'product_id');
    }
}
