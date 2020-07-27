<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Modules\Core\Exceptions\RepositoryException;
use Modules\Core\Http\Controllers\Controller;
use Modules\Product\Http\Requests\CreateProductTagRequest;
use Modules\Product\Http\Requests\UpdateProductTagRequest;
use Modules\Product\Repositories\Contracts\ProductTagRepositoryInterface;

class ProductTagController extends Controller
{
    /**
     * @var ProductTagRepositoryInterface
     */
    private $productTagRepository;


    /**
     * ProductCategoryController constructor.
     * @param ProductTagRepositoryInterface $productTagRepository
     */
    public function __construct(ProductTagRepositoryInterface $productTagRepository)
    {
        $this->productTagRepository = $productTagRepository;
    }

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $productTags = $this->genPagination($request, $this->productTagRepository);

        return view('product::product-tags.index', compact('productTags'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('product::product-tags.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param CreateProductTagRequest $request
     * @return RedirectResponse
     * @throws RepositoryException
     */
    public function store(CreateProductTagRequest $request)
    {
        $this->productTagRepository->create($request->except('_token'));

        return redirect()->route('product-tags.index')
            ->with(config('core.session_success'), _t('tag') . ' ' . _t('create_success'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $productTag = $this->productTagRepository->findById($id);

        return view('product::product-tags.edit', compact('productTag'));
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateProductTagRequest $request
     * @param int $id
     * @return RedirectResponse
     * @throws RepositoryException
     */
    public function update(UpdateProductTagRequest $request, $id)
    {
        $this->productTagRepository->updateById($id, $request->except(['_token', 'method']));

        return redirect()->route('product-tags.index')
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
        $this->productTagRepository->deleteById($id);

        return redirect()->route('product-tags.index')
            ->with(config('core.session_success'), _t('tag') . ' ' . _t('delete_success'));
    }
}
