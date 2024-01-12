<?php

namespace App\Repositories;

use App\Clients\Asaas;
use App\Dtos\Asaas\PaymentRequest;
use App\Repositories\Interfaces\PaymentRepositoryInterface;
use App\Supports\Result;
use Illuminate\Database\Eloquent\Model;

class PaymentRepository implements PaymentRepositoryInterface
{
    public function __construct(
        private readonly Asaas $client,
        private readonly Model $model,
    )
    {

    }

    public function requestPayment(PaymentRequest $request): Result
    {
        $result = $this->client->payment()->requestNewPayment($request);
        $this->registerResult($result);
        return $result;
    }

    private function registerResult(Result $result): void
    {
        if ($result->isSuccess()) {
            $this->model->create($result->getContent()->toArray());
        }
    }
}
