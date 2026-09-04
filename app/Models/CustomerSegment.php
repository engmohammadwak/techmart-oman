<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerSegment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'criteria_json',
        'customer_count',
    ];

    protected $casts = [
        'criteria_json' => 'array',
        'customer_count' => 'integer',
    ];

    public function getCriteriaAttribute(): array
    {
        return $this->criteria_json ?? [];
    }
}
