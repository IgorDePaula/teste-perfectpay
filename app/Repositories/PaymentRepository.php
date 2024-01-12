<?php

namespace App\Repositories;

use App\Clients\Asaas;
use App\Dtos\Asaas\PaymentRequest;
use App\Repositories\Interfaces\PaymentRepositoryInterface;
use App\Supports\AsaasMapper;
use App\Supports\Result;

class PaymentRepository implements PaymentRepositoryInterface
{
    public function __construct(private readonly Asaas $client, private readonly AsaasMapper $mapper)
    {

    }

    public function requestPayment(PaymentRequest $request): Result
    {
        return $this->client->payment()->requestNewPayment($request);
    }
}
