<?php

namespace Modules\Product\Entities;

use Astrotomic\Translatable\Translatable;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;
use Modules\Core\Entities\Traits\HasImageModel;
use Modules\Product\Entities\Traits\Attribute\ProductAttribute;
use Modules\Product\Entities\Traits\Methods\ProductMethod;
use Modules\Product\Entities\Traits\Relationship\ProductRelationship;
use Modules\Product\Entities\Traits\Scope\ProductScope;
use Spatie\MediaLibrary\HasMedia\HasMedia;

class Product extends Model implements HasMedia
{
    use Translatable, Cachable, HasImageModel;
    use ProductAttribute, ProductMethod, ProductRelationship, ProductScope;

    const FEATURE_IMAGE = 'feature';
    const DETAIL_IMAGE = 'detail';

    protected $fillable = ['brand_id', 'status', 'shippable', 'downloadable', 'regular_price', 'sale_price', 'quantity', 'sku', 'is_feature'];
    public $translatedAttributes = ['name', 'caption', 'description'];
}
