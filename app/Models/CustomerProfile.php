<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class CustomerProfile extends Model
{
    use HasFactory;

    protected $primaryKey = 'user_id';

    public $incrementing = false;

    protected $fillable = [
        'user_id',
        'avatar',
        'date_of_birth',
        'gender',
        'loyalty_points',
        'loyalty_tier',
        'wallet_balance',
        'referral_code',
        'referred_by',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'loyalty_points' => 'integer',
        'wallet_balance' => 'decimal:3',
    ];

    public function user(): HasOne
    {
        return $this->belongsTo(User::class);
    }

    public function referrer(): HasOne
    {
        return $this->belongsTo(User::class, 'referred_by');
    }
}
