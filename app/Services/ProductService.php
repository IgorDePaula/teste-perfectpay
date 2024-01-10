<?php

namespace App\Services;

use App\Repositories\ProductRepository;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductService
{
    public function __construct(private readonly ProductRepository $repository)
    {

    }

    public function getAllProducts(): JsonResource
    {
        return $this->repository->getAllProducts();
    }
}
