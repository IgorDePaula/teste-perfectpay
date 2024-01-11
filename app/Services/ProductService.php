<?php

namespace App\Services;

use App\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductService
{
    public function __construct(private readonly ProductRepositoryInterface $repository)
    {

    }

    public function getAllProducts(): JsonResource
    {
        return $this->repository->getAllProducts();
    }
}
