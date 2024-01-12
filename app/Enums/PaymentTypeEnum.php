<?php

namespace App\Enums;

enum PaymentTypeEnum: string
{
    case PIX = 'PIX';
    case TICKET = 'BOLETO';
    case CREDIT_CARD = 'CREDIT_CARD';
}
