<?php

namespace Modules\Product\Entities;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;
use Modules\Core\Entities\Traits\HasImageModel;
use Modules\Product\Entities\Traits\Attribute\BrandAttribute;
use Modules\Product\Entities\Traits\Methods\BrandMethod;
use Modules\Product\Entities\Traits\Scope\BrandScope;
use Spatie\MediaLibrary\HasMedia\HasMedia;

class Brand extends Model implements HasMedia
{
    use HasImageModel, Cachable;
    use BrandMethod, BrandAttribute, BrandScope;

    const THUMBNAIL = 'thumbnail';

    protected $fillable = ['name', 'is_feature', 'status'];
}
