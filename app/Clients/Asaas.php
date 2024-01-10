<?php

namespace App\Clients;

class Asaas implements HttpClientInterface
{
    private array $url = [
        'production' => 'https://api.asaas.com/',
        'sandbox' => 'https://sandbox.asaas.com/api/',
    ];

    public function getUrl(string $environment)
    {
        return $this->url[$environment];
    }
}
