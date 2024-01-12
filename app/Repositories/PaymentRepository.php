<?php

namespace App\Repositories;

use App\Clients\Asaas;
use App\Dtos\Asaas\PaymentRequest;
use App\Repositories\Interfaces\PaymentRepositoryInterface;
use App\Supports\Interfaces\MapperInterface;
use App\Supports\Result;
use Illuminate\Database\Eloquent\Model;

class PaymentRepository implements PaymentRepositoryInterface
{
    public function __construct(
        private readonly Asaas $client,
        private readonly Model $model,
        private readonly MapperInterface $mapper,
    ) {

    }

    public function requestPayment(PaymentRequest $request): Result
    {
        $result = $this->client->payment()->requestNewPayment($request);
        $this->registerResult($result);

        return $result;
    }

    public function pay(PaymentRequest $request): Result
    {
        $result = $this->client->payment()->makePayment($request)->pay();
        //$this->registerResult($result);

        return $result;
    }

    private function registerResult(Result $result): void
    {
        if ($result->isSuccess()) {
            $this->model->create($this->mapper->toPersistence($result->getContent()->toArray()));
        }
    }
}
