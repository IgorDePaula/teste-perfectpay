<?php

namespace App\Dtos\Asaas;

use App\Dtos\AbstractDto;
use DateTimeInterface;

class PaymentRequest extends AbstractDto
{
    public function __construct(
        public readonly string            $customer,
        public readonly string            $billingType,
        public readonly float             $value,
        public readonly DateTimeInterface $dueDate
    )
    {

    }

    public static function fromArray(array $data): static
    {
        return new static(
            customer: $data['customer'],
            billingType: $data['billingType'],
            value: $data['value'],
            dueDate: $data['dueDate']
        );
    }

    public function toArray(): array
    {
        return [
            'customer' => $this->customer,
            'billingType' => $this->billingType,
            'value' => $this->value,
            'dueDate' => $this->dueDate->format('Y-m-d')
        ];
    }
}
