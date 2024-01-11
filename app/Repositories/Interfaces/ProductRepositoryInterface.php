<?php

namespace App\Repositories\Interfaces;

use Illuminate\Http\Resources\Json\JsonResource;

interface ProductRepositoryInterface
{
    public function getAllProducts(): JsonResource;
}
