<?php

namespace App\Enums;

enum PaymentStatusEnum: string
{
    case PENDING = 'pendente';
    case PAID = 'pago';
    case CANCELLED = 'cancelado';
}
