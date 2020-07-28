<?php

namespace Modules\Product\Repositories;

use Illuminate\Database\Eloquent\Model;
use Modules\Core\Repositories\BaseRepository;
use Modules\Product\Entities\Product;
use Modules\Product\Repositories\Contracts\ProductRepositoryInterface;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    /**
     * ProductCategoryRepository constructor.
     * @param Product $product
     */
    public function __construct(Product $product)
    {
        $this->model = $product;
    }

    /**
     * @inheritDoc
     */
    public function create(array $attributes): Model
    {
        $model = parent::create($attributes);
        $model->categories()->sync($attributes['categories']);

        return $model;
    }

    /**
     * @inheritDoc
     */
    public function update(Model $model, array $attributes): Model
    {
        $model = parent::update($model, $attributes);
        $model->categories()->sync($attributes['categories']);

        return $model;
    }
}
