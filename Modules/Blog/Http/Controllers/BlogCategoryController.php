<?php

namespace Modules\Blog\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Modules\Blog\Entities\BlogCategory;
use Modules\Blog\Http\Requests\CreateBlogCategoryRequest;
use Modules\Blog\Http\Requests\UpdateBlogCategoryRequest;
use Modules\Blog\Repositories\Contracts\BlogCategoryRepositoryInterface;
use Modules\Core\Exceptions\RepositoryException;
use Modules\Core\Http\Controllers\Controller;

class BlogCategoryController extends Controller
{
    /**
     * @var BlogCategoryRepositoryInterface
     */
    private $blogCategoryRepository;

    /**
     * BlogCategoryController constructor.
     * @param BlogCategoryRepositoryInterface $blogCategoryRepository
     */
    public function __construct(BlogCategoryRepositoryInterface $blogCategoryRepository)
    {
        $this->blogCategoryRepository = $blogCategoryRepository;
        $this->defaultEagerLoad = ['parent'];
    }

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $blogCategories = $this->genPagination($request, $this->blogCategoryRepository);

        return view('blog::blog-categories.index', compact('blogCategories'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Application|Factory|View
     */
    public function create()
    {
        $parents = $this->blogCategoryRepository->toArray('id', 'name');

        return view('blog::blog-categories.create', compact('parents'));
    }

    /**
     * Store a newly created resource in storage.
     * @param CreateBlogCategoryRequest $request
     * @return RedirectResponse
     * @throws RepositoryException
     */
    public function store(CreateBlogCategoryRequest $request)
    {
        $this->removeIfZero($request, "parent_id");
        $blogCategory = $this->blogCategoryRepository->create($request->except('_token'));
        $this->uploadImage($blogCategory, $request, 'thumbnail', BlogCategory::THUMBNAIL);

        return redirect()->route('blog-categories.index')
            ->with(config('core.session_success'), _t('blog_category') . ' ' . _t('create_success'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $blogCategory = $this->blogCategoryRepository->findById($id);
        $parents = $this->blogCategoryRepository->toArray('id', 'name');
        unset($parents[ $id ]);

        return view('blog::blog-categories.edit', compact('parents', 'blogCategory'));
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateBlogCategoryRequest $request
     * @param int $id
     * @return RedirectResponse
     * @throws RepositoryException
     */
    public function update(UpdateBlogCategoryRequest $request, $id)
    {
        $blogCategory = $this->blogCategoryRepository->updateById($id, $request->except(['_token', 'method']));
        $this->uploadImage($blogCategory, $request, 'thumbnail', BlogCategory::THUMBNAIL);

        return redirect()->route('blog-categories.index')
            ->with(config('core.session_success'), _t('blog_category') . ' ' . _t('update_success'));

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return RedirectResponse
     * @throws RepositoryException
     */
    public function destroy($id)
    {
        $this->blogCategoryRepository->deleteById($id);

        return redirect()->route('blog-categories.index')
            ->with(config('core.session_success'), _t('blog_category') . ' ' . _t('delete_success'));
    }
}
