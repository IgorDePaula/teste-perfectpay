<?php

namespace App\Repositories;

use Illuminate\Http\Resources\Json\JsonResource;

interface ProductRepositoryInterface
{
    public function getAllProducts(): JsonResource;
}
