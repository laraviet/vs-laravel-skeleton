<?php

namespace Modules\Blog\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Modules\Blog\Entities\BlogPost;
use Modules\Blog\Http\Requests\CreateBlogPostRequest;
use Modules\Blog\Http\Requests\UpdateBlogPostRequest;
use Modules\Blog\Repositories\Contracts\BlogCategoryRepositoryInterface;
use Modules\Blog\Repositories\Contracts\BlogPostRepositoryInterface;
use Modules\Core\Exceptions\RepositoryException;
use Modules\Core\Http\Controllers\Controller;

class BlogPostController extends Controller
{
    /**
     * @var BlogPostRepositoryInterface
     */
    private $blogPostRepository;
    /**
     * @var BlogCategoryRepositoryInterface
     */
    private $blogCategoryRepository;

    /**
     * BlogCategoryController constructor.
     * @param BlogPostRepositoryInterface $blogPostRepository
     * @param BlogCategoryRepositoryInterface $blogCategoryRepository
     */
    public function __construct(BlogPostRepositoryInterface $blogPostRepository, BlogCategoryRepositoryInterface $blogCategoryRepository)
    {
        $this->blogPostRepository = $blogPostRepository;
        $this->blogCategoryRepository = $blogCategoryRepository;
        $this->defaultEagerLoad = ['categories'];
    }

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $blogPosts = $this->genPagination($request, $this->blogPostRepository);

        return view('blog::blog-posts.index', compact('blogPosts'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Application|Factory|View
     */
    public function create()
    {
        $categories = $this->blogCategoryRepository->toArray('id', 'name', 'active');

        return view('blog::blog-posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     * @param CreateBlogPostRequest $request
     * @return RedirectResponse
     * @throws RepositoryException
     */
    public function store(CreateBlogPostRequest $request)
    {
        $blogPost = $this->blogPostRepository->create($request->except('_token'));
        $this->uploadImage($blogPost, $request, 'feature_image', BlogPost::FEATURE_IMAGE);

        return redirect()->route('blog-posts.index')
            ->with(config('core.session_success'), _t('post') . ' ' . _t('create_success'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $blogPost = $this->blogPostRepository->findById($id);
        $categories = $this->blogCategoryRepository->toArray('id', 'name', 'active');

        return view('blog::blog-posts.edit', compact('blogPost', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateBlogPostRequest $request
     * @param int $id
     * @return RedirectResponse
     * @throws RepositoryException
     */
    public function update(UpdateBlogPostRequest $request, $id)
    {
        $blogPost = $this->blogPostRepository->updateById($id, $request->except(['_token', 'method']));
        $this->uploadImage($blogPost, $request, 'feature_image', BlogPost::FEATURE_IMAGE);

        return redirect()->route('blog-posts.index')
            ->with(config('core.session_success'), _t('post') . ' ' . _t('update_success'));

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return RedirectResponse
     * @throws RepositoryException
     */
    public function destroy($id)
    {
        $this->blogPostRepository->deleteById($id);

        return redirect()->route('blog-posts.index')
            ->with(config('core.session_success'), _t('post') . ' ' . _t('delete_success'));
    }
}
