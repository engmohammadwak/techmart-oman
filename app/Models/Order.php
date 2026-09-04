<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'order_number',
        'user_id',
        'branch_id',
        'channel',
        'status',
        'payment_status',
        'subtotal',
        'discount',
        'vat_amount',
        'shipping_cost',
        'total',
        'currency',
        'coupon_code',
        'shipping_address_id',
        'notes',
    ];

    protected $casts = [
        'subtotal' => 'decimal:3',
        'discount' => 'decimal:3',
        'vat_amount' => 'decimal:3',
        'shipping_cost' => 'decimal:3',
        'total' => 'decimal:3',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    public function shippingAddress(): BelongsTo
    {
        return $this->belongsTo(Address::class, 'shipping_address_id');
    }

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    public function shipment(): HasOne
    {
        return $this->hasOne(Shipment::class);
    }

    public function returns(): HasMany
    {
        return $this->hasMany(ReturnOrder::class, 'order_id');
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public static function generateOrderNumber(): string
    {
        $prefix = 'ORD';
        $date = now()->format('Ymd');
        $random = strtoupper(substr(uniqid(), -6));
        return "{$prefix}-{$date}-{$random}";
    }

    public function getCanReturnAttribute(): bool
    {
        if (!$this->shipment || !$this->shipment->delivered_at) {
            return false;
        }

        $daysSinceDelivery = now()->diffInDays($this->shipment->delivered_at);
        $isFirstItemNew = $this->items()->where('condition_snapshot', 'new')->exists();
        $returnPeriod = $isFirstItemNew ? 14 : 7;

        return $daysSinceDelivery <= $returnPeriod;
    }
}
