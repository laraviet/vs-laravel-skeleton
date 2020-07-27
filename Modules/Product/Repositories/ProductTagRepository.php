<?php

namespace Modules\Product\Repositories;

use Modules\Core\Repositories\BaseRepository;
use Modules\Product\Entities\ProductTag;
use Modules\Product\Repositories\Contracts\ProductTagRepositoryInterface;

class ProductTagRepository extends BaseRepository implements ProductTagRepositoryInterface
{
    /**
     * ProductCategoryRepository constructor.
     * @param ProductTag $productTag
     */
    public function __construct(ProductTag $productTag)
    {
        $this->model = $productTag;
    }
}
