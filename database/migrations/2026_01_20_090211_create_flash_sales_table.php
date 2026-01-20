<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('flash_sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->decimal('discount_percentage', 5, 2); // e.g., 20.00
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->timestamps();

            $table->unique('product_id'); // Only one active flash sale per product
        });
    }

    public function down()
    {
        Schema::dropIfExists('flash_sales');
    }
};