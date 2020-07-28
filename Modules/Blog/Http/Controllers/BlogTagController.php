<?php

namespace Modules\Blog\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Modules\Blog\Http\Requests\CreateBlogTagRequest;
use Modules\Blog\Http\Requests\UpdateBlogTagRequest;
use Modules\Blog\Repositories\Contracts\BlogTagRepositoryInterface;
use Modules\Core\Exceptions\RepositoryException;
use Modules\Core\Http\Controllers\Controller;

class BlogTagController extends Controller
{
    /**
     * @var BlogTagRepositoryInterface
     */
    private $blogTagRepository;

    /**
     * BlogCategoryController constructor.
     * @param BlogTagRepositoryInterface $blogTagRepository
     */
    public function __construct(BlogTagRepositoryInterface $blogTagRepository)
    {
        $this->blogTagRepository = $blogTagRepository;
    }

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $blogTags = $this->genPagination($request, $this->blogTagRepository);

        return view('blog::blog-tags.index', compact('blogTags'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('blog::blog-tags.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param CreateBlogTagRequest $request
     * @return RedirectResponse
     * @throws RepositoryException
     */
    public function store(CreateBlogTagRequest $request)
    {
        $this->blogTagRepository->create($request->except('_token'));

        return redirect()->route('blog-tags.index')
            ->with(config('core.session_success'), _t('tag') . ' ' . _t('create_success'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $blogTag = $this->blogTagRepository->findById($id);

        return view('blog::blog-tags.edit', compact('blogTag'));
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateBlogTagRequest $request
     * @param int $id
     * @return RedirectResponse
     * @throws RepositoryException
     */
    public function update(UpdateBlogTagRequest $request, $id)
    {
        $this->blogTagRepository->updateById($id, $request->except(['_token', 'method']));

        return redirect()->route('blog-tags.index')
            ->with(config('core.session_success'), _t('tag') . ' ' . _t('update_success'));

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return RedirectResponse
     * @throws RepositoryException
     */
    public function destroy($id)
    {
        $this->blogTagRepository->deleteById($id);

        return redirect()->route('blog-tags.index')
            ->with(config('core.session_success'), _t('tag') . ' ' . _t('delete_success'));
    }
}
