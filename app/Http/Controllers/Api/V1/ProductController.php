<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\ProductCollect;
use App\Models\Product;
use App\Repositories\ProductRepository;

/**
 * Controller of products.
 * @package App\Http\Controllers\Api\V1
 */
class ProductController extends Controller
{
    /** @var \ProductRepository $productRepository Repository of products. */
    protected $productRepository;

    /**
     * ProductController constructor.
     *
     * @param Product $productModel
     */
    public function __construct(Product $productModel)
    {
        $this->productRepository = new ProductRepository($productModel);
    }

    /**
     * Method responsible for listing all products.
     */
    public function listProducts()
    {
        $products = $this->productRepository->getAll();

        return new ProductCollect($products);
    }
}
