<?php

namespace App\Enums;

enum PaymentStatusEnum: string
{
    case PENDING = 'PENDING';
    case PAID = 'pago';
    case CANCELLED = 'cancelado';
}
