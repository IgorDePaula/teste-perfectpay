<?php

namespace App\Repositories;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductRepository implements ProductRepositoryInterface
{
    public function __construct(private readonly Product $product)
    {

    }

    public function getAllProducts(): JsonResource
    {
        return ProductResource::collection($this->product->all());
    }
}
