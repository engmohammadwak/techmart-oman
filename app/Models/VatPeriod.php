<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VatPeriod extends Model
{
    use HasFactory;

    protected $fillable = [
        'period_start',
        'period_end',
        'vat_collected',
        'vat_paid',
        'net_payable',
        'status',
        'filed_at',
    ];

    protected $casts = [
        'period_start' => 'date',
        'period_end' => 'date',
        'vat_collected' => 'decimal:3',
        'vat_paid' => 'decimal:3',
        'net_payable' => 'decimal:3',
        'filed_at' => 'datetime',
    ];
}
