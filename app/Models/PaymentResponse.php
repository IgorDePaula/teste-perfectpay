<?php

namespace App\Models;

use App\Enums\PaymentStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentResponse extends Model
{
    use HasFactory;

    protected $casts = [
        'status' => PaymentStatusEnum::class,
    ];

    protected $fillable = ['response_id', 'customer', 'value', 'net_value', 'billing_type', 'status', 'due_date', 'original_due_date', 'invoice_url', 'invoice_number', 'external_reference', 'audit_log'];

    public function pay()
    {
        $this->update(['status' => PaymentStatusEnum::PAID]);
    }

    public function cancel()
    {
        $this->update(['status' => PaymentStatusEnum::CANCELLED]);
    }
}
