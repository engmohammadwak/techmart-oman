<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Staff extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'branch_id',
        'role',
        'permissions_json',
        'is_active',
    ];

    protected $casts = [
        'permissions_json' => 'array',
        'is_active' => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    public function getPermissionsAttribute(): array
    {
        return $this->permissions_json ?? [];
    }

    public function hasPermission(string $permission): bool
    {
        return in_array($permission, $this->permissions);
    }
}
