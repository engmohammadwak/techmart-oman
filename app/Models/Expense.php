<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'category',
        'description',
        'vendor',
        'amount',
        'vat_amount',
        'payment_method',
        'receipt_url',
        'is_recurring',
        'created_by',
        'expense_date',
    ];

    protected $casts = [
        'amount' => 'decimal:3',
        'vat_amount' => 'decimal:3',
        'is_recurring' => 'boolean',
        'expense_date' => 'date',
    ];

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
