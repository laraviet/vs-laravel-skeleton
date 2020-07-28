<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Modules\Core\Exceptions\RepositoryException;
use Modules\Core\Http\Controllers\Controller;
use Modules\Product\Entities\Product;
use Modules\Product\Http\Requests\CreateProductRequest;
use Modules\Product\Http\Requests\UpdateProductRequest;
use Modules\Product\Repositories\Contracts\BrandRepositoryInterface;
use Modules\Product\Repositories\Contracts\ProductCategoryRepositoryInterface;
use Modules\Product\Repositories\Contracts\ProductRepositoryInterface;

class ProductController extends Controller
{
    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;
    /**
     * @var BrandRepositoryInterface
     */
    private $brandRepository;
    /**
     * @var ProductCategoryRepositoryInterface
     */
    private $productCategoryRepository;

    /**
     * ProductController constructor.
     * @param ProductRepositoryInterface $productRepository
     * @param BrandRepositoryInterface $brandRepository
     * @param ProductCategoryRepositoryInterface $productCategoryRepository
     */
    public function __construct(
        ProductRepositoryInterface $productRepository,
        BrandRepositoryInterface $brandRepository,
        ProductCategoryRepositoryInterface $productCategoryRepository
    )
    {
        $this->productRepository = $productRepository;
        $this->brandRepository = $brandRepository;
        $this->productCategoryRepository = $productCategoryRepository;
        $this->defaultEagerLoad = ['categories'];
    }

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $products = $this->genPagination($request, $this->productRepository);

        return view('product::products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Application|Factory|View
     */
    public function create()
    {
        $brands = $this->brandRepository->toArray('id', 'name', 'active');
        $categories = $this->productCategoryRepository->toArray('id', 'name', 'active');

        return view('product::products.create', compact('brands', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     * @param CreateProductRequest $request
     * @return RedirectResponse
     * @throws RepositoryException
     */
    public function store(CreateProductRequest $request)
    {
        $product = $this->productRepository->create($request->except('_token'));
        $this->uploadImage($product, $request, 'feature_image', Product::FEATURE_IMAGE);

        return redirect()->route('products.index')
            ->with(config('core.session_success'), _t('product') . ' ' . _t('create_success'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $product = $this->productRepository->findById($id);
        $brands = $this->brandRepository->toArray('id', 'name', 'active');
        $categories = $this->productCategoryRepository->toArray('id', 'name', 'active');

        return view('product::products.edit', compact('product', 'brands', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateProductRequest $request
     * @param int $id
     * @return RedirectResponse
     * @throws RepositoryException
     */
    public function update(UpdateProductRequest $request, $id)
    {
        $product = $this->productRepository->updateById($id, $request->except(['_token', 'method']));
        $this->uploadImage($product, $request, 'feature_image', Product::FEATURE_IMAGE);

        return redirect()->route('products.index')
            ->with(config('core.session_success'), _t('product') . ' ' . _t('update_success'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return RedirectResponse
     * @throws RepositoryException
     */
    public function destroy($id)
    {
        $this->productRepository->deleteById($id);

        return redirect()->route('products.index')
            ->with(config('core.session_success'), _t('product') . ' ' . _t('delete_success'));
    }
}
