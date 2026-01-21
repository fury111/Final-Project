<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemDiscount extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'discount_type',      // 'percentage' or 'fixed'
        'discount_amount',    // e.g., 20.00 for 20% or $20
        'valid_until',        // Optional expiry date
        'is_active',          // Toggle discount
    ];

    protected $casts = [
        'valid_until' => 'datetime',
        'is_active' => 'boolean',
        'discount_amount' => 'decimal:2',
    ];

    // Relationships
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Accessors
    public function getFormattedDiscountAttribute()
    {
        return $this->discount_type === 'percentage' 
            ? $this->discount_amount . '%' 
            : '$' . number_format($this->discount_amount, 2);
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeValid($query)
    {
        return $query->where(function ($q) {
            $q->whereNull('valid_until')
              ->orWhere('valid_until', '>=', now());
        });
    }

    // Check if discount is currently valid
    public function isValid(): bool
    {
        return $this->is_active && 
               ($this->valid_until === null || $this->valid_until >= now());
    }
}