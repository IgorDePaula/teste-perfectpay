<?php

namespace App\Supports;

use App\Supports\Interfaces\MapperInterface;

class AsaasMapper implements MapperInterface
{
    public function toPersistence(array $data): array
    {
        return [
            ...$data,
            'response_id' => $data['id'],
            'net_value' => $data['netValue'],
            'billing_type' => $data['billingType'],
            'due_date' => $data['dueDate'],
            'original_due_date' => $data['originalDueDate'],
            'invoice_url' => $data['invoiceUrl'],
            'invoice_number' => $data['invoiceNumber'],
            'audit_log' => $data['audit'],
        ];
    }
}
