<?php

namespace App\Clients\Asaas\Method;

use App\Dtos\Asaas\PaymentRequest;

class MethodFactory
{
    public static function make(PaymentRequest $request): AbstractPaymentMethod
    {
        return match ($request->billingType) {
            'pix' => new Pix($request),
            'credit_card' => new CreditCard($request),
            'ticket' => new Ticket($request)
        };
    }
}
