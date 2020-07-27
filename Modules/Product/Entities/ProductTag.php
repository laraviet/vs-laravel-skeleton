<?php

namespace Modules\Product\Entities;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;
use Modules\Product\Entities\Traits\Attribute\ProductTagAttribute;
use Modules\Product\Entities\Traits\Methods\ProductTagMethod;
use Modules\Product\Entities\Traits\Scope\ProductTagScope;

class ProductTag extends Model
{
    use Cachable;
    use ProductTagScope, ProductTagMethod, ProductTagAttribute;

    protected $fillable = ['name', 'status'];
}
