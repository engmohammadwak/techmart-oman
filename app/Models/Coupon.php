<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'type',
        'value',
        'min_order',
        'max_discount',
        'usage_limit',
        'used_count',
        'starts_at',
        'expires_at',
        'is_active',
    ];

    protected $casts = [
        'value' => 'decimal:3',
        'min_order' => 'decimal:3',
        'max_discount' => 'decimal:3',
        'starts_at' => 'datetime',
        'expires_at' => 'datetime',
        'is_active' => 'boolean',
    ];

    public function isValid(): bool
    {
        if (!$this->is_active) {
            return false;
        }

        if ($this->starts_at && $this->starts_at->isFuture()) {
            return false;
        }

        if ($this->expires_at && $this->expires_at->isPast()) {
            return false;
        }

        if ($this->usage_limit && $this->used_count >= $this->usage_limit) {
            return false;
        }

        return true;
    }

    public function calculateDiscount(float $orderTotal): float
    {
        if (!$this->isValid()) {
            return 0;
        }

        if ($orderTotal < $this->min_order) {
            return 0;
        }

        $discount = $this->type === 'percentage'
            ? ($orderTotal * $this->value / 100)
            : $this->value;

        if ($this->max_discount && $discount > $this->max_discount) {
            return $this->max_discount;
        }

        return $discount;
    }
}
