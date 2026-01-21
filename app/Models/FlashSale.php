<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlashSale extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'discount_percentage',
        'start_date',
        'end_date',
        'is_active',
    ];

    protected $dates = ['start_date', 'end_date'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}