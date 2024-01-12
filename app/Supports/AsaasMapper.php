<?php

namespace App\Supports;

use App\Dtos\AbstractDto;
use App\Dtos\Asaas\PaymentResponse;
use App\Supports\Interfaces\MapperInterface;

class AsaasMapper implements MapperInterface
{
    public function toDomain(array $data): AbstractDto
    {
        return PaymentResponse::fromArray([...$data, 'id' => $data['response_id']]);
    }
}
