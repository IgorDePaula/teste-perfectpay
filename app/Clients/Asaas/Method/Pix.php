<?php

namespace App\Clients\Asaas\Method;

use App\Clients\Asaas\Method\Responses\PixResponse;
use App\Exceptions\AsaasException;
use App\Supports\Result;

class Pix extends AbstractPaymentMethod
{
    public function pay(): Result
    {
        $response = $this->client->getClient()->post('api/v3/payments/id/pixQrCode', ['form_params' => ['id' => $this->request->id]]);
        if ($response->getStatusCode() == 200) {
            return Result::success(new PixResponse(json_decode($response->getBody()->getContents(), true)));
        }
        if ($response->getStatusCode() == 400) {
            $error = json_decode($response->getBody()->getContents(), true);

            return Result::failure(new AsaasException($error['errors'][0]['description']));
        }
        if ($response->getStatusCode() == 401) {
            return Result::failure(new AsaasException('Unauthorized'));
        }

        return Result::failure(new AsaasException('Unknow'));
    }
}
