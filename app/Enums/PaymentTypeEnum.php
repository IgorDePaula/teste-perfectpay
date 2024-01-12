<?php

namespace App\Enums;

enum PaymentTypeEnum: string
{
    case PIX = 'pix';
    case TICKET = 'boleto';
    case CREDIT_CARD = 'credit_card';
}
