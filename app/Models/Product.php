<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'sku',
        'barcode',
        'name_ar',
        'name_en',
        'slug',
        'description_ar',
        'description_en',
        'category_id',
        'brand_id',
        'condition_type',
        'condition_grade',
        'battery_health',
        'inspection_report',
        'warranty_days',
        'cost_price',
        'price',
        'compare_at_price',
        'vat_rate',
        'track_inventory',
        'is_featured',
        'status',
        'meta_title',
        'meta_description',
    ];

    protected $casts = [
        'inspection_report' => 'array',
        'battery_health' => 'integer',
        'warranty_days' => 'integer',
        'cost_price' => 'decimal:3',
        'price' => 'decimal:3',
        'compare_at_price' => 'decimal:3',
        'vat_rate' => 'decimal:2',
        'track_inventory' => 'boolean',
        'is_featured' => 'boolean',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function variants(): HasMany
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function getNameAttribute(): string
    {
        return app()->getLocale() === 'ar' ? $this->name_ar : $this->name_en;
    }

    public function getDescriptionAttribute(): ?string
    {
        return app()->getLocale() === 'ar' ? $this->description_ar : $this->description_en;
    }

    public function getIsNewAttribute(): bool
    {
        return $this->condition_type === 'new';
    }

    public function getIsUsedAttribute(): bool
    {
        return $this->condition_type === 'used';
    }

    public function getVatAmountAttribute(): float
    {
        return $this->price * ($this->vat_rate / 100);
    }

    public function getPriceWithVatAttribute(): float
    {
        return $this->price + $this->vat_amount;
    }

    public function getDiscountPercentageAttribute(): ?float
    {
        if (!$this->compare_at_price || $this->compare_at_price <= $this->price) {
            return null;
        }
        return round((($this->compare_at_price - $this->price) / $this->compare_at_price) * 100, 2);
    }
}
