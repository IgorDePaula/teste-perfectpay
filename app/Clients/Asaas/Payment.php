<?php

namespace App\Clients\Asaas;

use App\Clients\Asaas;
use App\Dtos\Asaas\PaymentRequest;
use App\Dtos\Asaas\PaymentResponse;
use App\Exceptions\AsaasException;
use App\Supports\Result;

class Payment implements ActionInterface
{
    public function __construct(private readonly Asaas $asaas)
    {

    }

    public function requestNewPayment(PaymentRequest $request): Result
    {
        $response = $this->asaas->getClient()->post('/api/v3/payments', ['form_params' => $request->toArray()]);
        if ($response->getStatusCode() == 200) {
            return Result::success(PaymentResponse::fromArray(json_decode($response->getBody()->getContents(), true)));
        }
        if ($response->getStatusCode() == 400) {
            $error = json_decode($response->getBody()->getContents(), true);

            return Result::failure(new AsaasException($error['errors'][0]['description']));
        }
        if ($response->getStatusCode() == 401) {
            return Result::failure(new AsaasException('Unauthorized'));
        }
    }
}
