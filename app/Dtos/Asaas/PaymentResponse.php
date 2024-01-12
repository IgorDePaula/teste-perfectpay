<?php

namespace App\Dtos\Asaas;

use App\Dtos\AbstractDto;

class PaymentResponse extends AbstractDto
{

    public function __construct(
        public readonly string  $id,
        public readonly string  $customer,
        public readonly float   $value,
        public readonly float   $netValue,
        public readonly string  $billintType,
        public readonly string  $status,
        public readonly string  $dueDate,
        public readonly string  $originalDueDate,
        public readonly string  $invoiceUrl,
        public readonly string  $invoiceNumber,
        public readonly ?string $externalReference,
    )
    {

    }

    public static function fromArray(array $data): static
    {
        return new static(
            id: $data['id'],
            customer: $data['customer'],
            value: $data['value'],
            netValue: $data['netValue'],
            billintType: $data['billingType'],
            status: $data['status'],
            dueDate: $data['dueDate'],
            originalDueDate: $data['originalDueDate'],
            invoiceUrl: $data['invoiceUrl'],
            invoiceNumber: $data['invoiceNumber'],
            externalReference: $data['externalReference'] ?? null
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'dueDate' => $this->dueDate,
            'value' => $this->value,
            'customer' => $this->customer,
            'externalReference' => $this->externalReference,
            'status' => $this->status,
            'originalDueDate' => $this->originalDueDate,
            'billingType' => $this->billintType,
            'invoiceUrl' => $this->invoiceUrl,
            'invoiceNumber' => $this->invoiceNumber,
            'netValue' => $this->netValue
        ];
    }
}