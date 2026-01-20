<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('item_discounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->enum('discount_type', ['percentage', 'fixed']);
            $table->decimal('discount_amount', 10, 2); // e.g., 20.00 for % or $ amount
            $table->dateTime('valid_until')->nullable(); // Optional expiry
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            // Ensure only one active discount per product
            $table->unique(['product_id', 'is_active'], 'active_product_discount');
        });
    }

    public function down()
    {
        Schema::dropIfExists('item_discounts');
    }
};