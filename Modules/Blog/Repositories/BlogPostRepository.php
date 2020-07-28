<?php

namespace Modules\Blog\Repositories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Modules\Blog\Entities\BlogPost;
use Modules\Blog\Repositories\Contracts\BlogPostRepositoryInterface;
use Modules\Core\Repositories\BaseRepository;

class BlogPostRepository extends BaseRepository implements BlogPostRepositoryInterface
{
    /**
     * ProductCategoryRepository constructor.
     * @param BlogPost $blogPost
     */
    public function __construct(BlogPost $blogPost)
    {
        $this->model = $blogPost;
    }

    /**
     * @inheritDoc
     */
    public function create(array $attributes): Model
    {
        if ($attributes['status'] == 1) {
            $attributes['published_at'] = Carbon::now();
        }

        $attributes['created_by'] = auth()->user()->id;

        return parent::create($attributes);
    }

    /**
     * @inheritDoc
     */
    public function update(Model $model, array $attributes): Model
    {
        if ($model->published_at == null && $attributes['status'] == 1) {
            $attributes['published_at'] = Carbon::now();
        }

        return parent::update($model, $attributes);
    }
}
