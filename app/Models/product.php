<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'slug',
        'image_path',
        'stock_quantity',
        'category_id',
        'description',
        'sales_count',
    ];

    // Add this method to handle image paths
    public function getImagePathAttribute($value)
    {
        // If image path is empty, return a default placeholder
        if (empty($value)) {
            return 'https://placehold.co/200x200?text=No+Image';
        }
        
        // If image path starts with http, return as is
        if (strpos($value, 'http') === 0) {
            return $value;
        }
        
        // Otherwise, prepend storage path
        return asset('storage/' . $value);
    }

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($product) {
            if (empty($product->slug)) {
                $product->slug = Str::slug($product->name);
                
                // Ensure uniqueness
                $originalSlug = $product->slug;
                $counter = 1;
                while (self::where('slug', $product->slug)->where('id', '!=', $product->id)->exists()) {
                    $product->slug = $originalSlug . '-' . $counter;
                    $counter++;
                }
            }
        });
    }

    // Relationships
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function flashSale()
    {
        return $this->hasOne(FlashSale::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    // Method to get total quantity sold
    public function getTotalQuantitySoldAttribute()
    {
        return $this->orderItems()->sum('quantity');
    }
}