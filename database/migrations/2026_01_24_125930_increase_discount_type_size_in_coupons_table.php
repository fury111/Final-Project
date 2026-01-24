<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('coupons', function (Blueprint $table) {
            $table->string('discount_type', 50)->change(); // Increase from default 255 if needed
        });
    }

    public function down()
    {
        Schema::table('coupons', function (Blueprint $table) {
            $table->string('discount_type', 255)->change(); // Revert if needed
        });
    }
};