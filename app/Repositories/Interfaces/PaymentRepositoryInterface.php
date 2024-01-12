<?php

namespace App\Repositories\Interfaces;

use App\Dtos\Asaas\PaymentRequest;
use App\Supports\Result;

interface PaymentRepositoryInterface
{
    public function requestPayment(PaymentRequest $request): Result;
}
