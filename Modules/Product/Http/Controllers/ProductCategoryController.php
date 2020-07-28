<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Modules\Core\Exceptions\RepositoryException;
use Modules\Core\Http\Controllers\Controller;
use Modules\Product\Entities\ProductCategory;
use Modules\Product\Http\Requests\CreateProductCategoryRequest;
use Modules\Product\Http\Requests\UpdateProductCategoryRequest;
use Modules\Product\Repositories\Contracts\ProductCategoryRepositoryInterface;

class ProductCategoryController extends Controller
{
    /**
     * @var ProductCategoryRepositoryInterface
     */
    private $productCategoryRepository;

    /**
     * ProductCategoryController constructor.
     * @param ProductCategoryRepositoryInterface $productCategoryRepository
     */
    public function __construct(ProductCategoryRepositoryInterface $productCategoryRepository)
    {
        $this->productCategoryRepository = $productCategoryRepository;
        $this->defaultEagerLoad = ['parent'];
    }

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $productCategories = $this->genPagination($request, $this->productCategoryRepository);

        return view('product::product-categories.index', compact('productCategories'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Application|Factory|View
     */
    public function create()
    {
        $parents = $this->productCategoryRepository->toArrayWithNone('id', 'name');

        return view('product::product-categories.create', compact('parents'));
    }

    /**
     * Store a newly created resource in storage.
     * @param CreateProductCategoryRequest $request
     * @return RedirectResponse
     * @throws RepositoryException
     */
    public function store(CreateProductCategoryRequest $request)
    {
        $this->removeIfZero($request, "parent_id");
        $productCategory = $this->productCategoryRepository->create($request->except('_token'));
        $this->uploadImage($productCategory, $request, 'thumbnail', ProductCategory::THUMBNAIL);

        return redirect()->route('product-categories.index')
            ->with(config('core.session_success'), _t('product_category') . ' ' . _t('create_success'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $productCategory = $this->productCategoryRepository->findById($id);
        $parents = $this->productCategoryRepository->toArrayWithNone('id', 'name');
        unset($parents[ $id ]);

        return view('product::product-categories.edit', compact('parents', 'productCategory'));
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateProductCategoryRequest $request
     * @param int $id
     * @return RedirectResponse
     * @throws RepositoryException
     */
    public function update(UpdateProductCategoryRequest $request, $id)
    {
        $productCategory = $this->productCategoryRepository->updateById($id, $request->except(['_token', 'method']));
        $this->uploadImage($productCategory, $request, 'thumbnail', ProductCategory::THUMBNAIL);

        return redirect()->route('product-categories.index')
            ->with(config('core.session_success'), _t('product_category') . ' ' . _t('update_success'));

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return RedirectResponse
     * @throws RepositoryException
     */
    public function destroy($id)
    {
        $this->productCategoryRepository->deleteById($id);

        return redirect()->route('product-categories.index')
            ->with(config('core.session_success'), _t('product_category') . ' ' . _t('delete_success'));
    }
}
