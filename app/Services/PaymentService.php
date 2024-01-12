<?php

namespace App\Services;

use App\Dtos\Asaas\PaymentRequest;
use App\Repositories\Interfaces\PaymentRepositoryInterface;
use App\Supports\Result;

class PaymentService
{
    public function __construct(private readonly PaymentRepositoryInterface $repository)
    {

    }

    public function pay(PaymentRequest $request): Result
    {
        return $this->repository->requestPayment($request);
    }
}
