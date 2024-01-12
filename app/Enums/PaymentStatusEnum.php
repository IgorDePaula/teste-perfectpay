<?php

namespace App\Enums;

enum PaymentStatusEnum: string
{
    case PENDING = 'PENDING';
    case PAID = 'PAID';
    case CANCELLED = 'CANCELLED';
    case CONFIRMED = 'CONFIRMED';
}
