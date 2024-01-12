<?php

namespace App\Clients\Asaas\Method\Responses;

class TicketRespose extends AbstractMethodResponse
{
    public function getResult(): string
    {
        return $this->response['identificationField'];
    }
}
