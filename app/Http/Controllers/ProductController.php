<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\CreateProduct;
use App\Http\Requests\Product\DeleteProduct;
use App\Http\Requests\Product\ProductList;
use App\Http\Requests\Product\ShowProduct;
use App\Http\Requests\Product\UpdateProduct;
use App\Services\ProductService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    private ProductService $productService;

    public function __construct(ProductService $productService)
    {
        parent::__construct();

        $this->productService = $productService;
    }

    /**
     * @param ProductList $request
     * @return JsonResponse
     */
    public function index(ProductList $request): JsonResponse
    {
        $productList = $this->productService->getList($request->all());

        return $this->json($productList);
    }

    /**
     * @param ShowProduct $request
     * @return JsonResponse
     */
    public function show(ShowProduct $request): JsonResponse
    {
        $product = $this->productService->getById($request->getId());

        return $this->json($product->toArray());
    }

    /**
     * @param CreateProduct $request
     * @return JsonResponse
     */
    public function create(CreateProduct $request): JsonResponse
    {
        $product = $this->productService->create($request);

        return $this->json($product->toArray(), Response::HTTP_CREATED);
    }

    /**
     * @param UpdateProduct $request
     * @return JsonResponse
     */
    public function update(UpdateProduct $request): JsonResponse
    {
        $product = $this->productService->update($request->getId(), $request);

        return $this->json($product->toArray());
    }

    /**
     * @param DeleteProduct $request
     * @return JsonResponse
     */
    public function delete(DeleteProduct $request): JsonResponse
    {
        $this->productService->delete($request->getId());

        return $this->json([], JsonResponse::HTTP_NO_CONTENT);
    }
}
