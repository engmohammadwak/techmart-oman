<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_number',
        'invoicable_type',
        'invoicable_id',
        'type',
        'amount',
        'vat_amount',
        'total',
        'status',
        'due_date',
        'created_at',
    ];

    protected $casts = [
        'amount' => 'decimal:3',
        'vat_amount' => 'decimal:3',
        'total' => 'decimal:3',
        'due_date' => 'date',
        'created_at' => 'datetime',
    ];

    public $timestamps = false;

    public function invoicable()
    {
        return $this->morphTo();
    }
}
