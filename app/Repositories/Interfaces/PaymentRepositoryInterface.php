<?php

namespace App\Repositories\Interfaces;

use App\Dtos\Asaas\PaymentRequest;
use App\Dtos\Asaas\PaymentResponse;

interface PaymentRepositoryInterface
{
    public function pay(PaymentRequest $request): PaymentResponse;
}
