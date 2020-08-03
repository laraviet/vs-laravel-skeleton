<?php

namespace Modules\Product\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Modules\Product\Repositories\Contracts\ProductRepositoryInterface;

class ProductPriceController extends Controller
{
    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;

    /**
     * ProductPriceController constructor.
     * @param ProductRepositoryInterface $productRepository
     */
    public function __construct(ProductRepositoryInterface $productRepository)
    {

        $this->productRepository = $productRepository;
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return JsonResponse
     */
    public function show($id)
    {
        $product = $this->productRepository->findById($id);

        return response()->json([
            'id'         => $product->id,
            'unit_price' => $product->sale_price ?? $product->regular_price
        ]);
    }
}
