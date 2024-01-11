<?php

namespace App\Services;

use App\Clients\Asaas;
use App\Dtos\Asaas\Client;
use App\Supports\Result;

class AsaasService
{
    public function __construct(private readonly Asaas $client)
    {

    }

    public function client(Client $client): Result
    {
        return $this->client->client()->newClient($client);
    }
}
