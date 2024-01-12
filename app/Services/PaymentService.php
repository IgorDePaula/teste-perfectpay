<?php

namespace App\Services;

use App\Dtos\Asaas\Client;
use App\Dtos\Asaas\PaymentRequest;
use App\Enums\PaymentMethodEnum;
use App\Models\Product;
use App\Repositories\Interfaces\PaymentRepositoryInterface;
use App\Supports\Result;

class PaymentService
{
    public function __construct(private readonly PaymentRepositoryInterface $repository)
    {

    }

    public function pay(Client $client, Product $product, PaymentMethodEnum $paymentMethod): Result
    {
        $paymentRequest = PaymentRequest::fromArray(['dueDate' => now()->format('Y-m-d'), 'customer' => $client->id, 'value' => $product->price, 'billingType' => $paymentMethod->name]);
        $paymentRequested = $this->repository->requestPayment($paymentRequest);
        if ($paymentRequested->isError()) {
            return $paymentRequested;
        }
        $paymentRequest = PaymentRequest::fromArray([...$paymentRequest->toArray(), 'id' => $paymentRequested->getContent()->id]);

        return $this->repository->pay($paymentRequest);
    }
}
