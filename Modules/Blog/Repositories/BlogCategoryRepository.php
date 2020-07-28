<?php

namespace Modules\Blog\Repositories;

use Illuminate\Database\Eloquent\Model;
use Modules\Blog\Entities\BlogCategory;
use Modules\Blog\Repositories\Contracts\BlogCategoryRepositoryInterface;
use Modules\Core\Repositories\BaseRepository;

class BlogCategoryRepository extends BaseRepository implements BlogCategoryRepositoryInterface
{
    /**
     * ProductCategoryRepository constructor.
     * @param BlogCategory $blogCategory
     */
    public function __construct(BlogCategory $blogCategory)
    {
        $this->model = $blogCategory;
    }

    /**
     * @inheritDoc
     */
    public function toArray($key, $column, $scope = null): array
    {
        $list = parent::toArray($key, $column, $scope);

        return array_merge([
            0 => "None",
        ], $list);
    }

    /**
     * @inheritDoc
     */
    public function updateById($id, array $attributes): Model
    {
        if ($attributes['parent_id'] != 0) {
            return parent::updateById($id, $attributes);
        }

        $model = parent::updateById($id, array_except($attributes, 'parent_id'));
        $model->parent_id = null;
        $model->save();

        return $model;
    }
}
