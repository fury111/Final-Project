<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        // Check if slug column exists
        if (!Schema::hasColumn('products', 'slug')) {
            Schema::table('products', function (Blueprint $table) {
                $table->string('slug')->nullable(); // Don't make it unique initially
            });
        }

        // Generate slugs for existing products
        $products = DB::table('products')->get();
        foreach ($products as $product) {
            if (empty($product->slug)) {
                $slug = \Str::slug($product->name);
                
                // Make it unique
                $counter = 1;
                $originalSlug = $slug;
                while (DB::table('products')->where('slug', $slug)->where('id', '!=', $product->id)->exists()) {
                    $slug = $originalSlug . '-' . $counter;
                    $counter++;
                }
                
                DB::table('products')->where('id', $product->id)->update(['slug' => $slug]);
            }
        }
        
        // Now make slug unique
        Schema::table('products', function (Blueprint $table) {
            $table->unique('slug'); // Add unique constraint after population
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropUnique(['slug']); // Drop unique constraint first
            $table->dropColumn('slug');
        });
    }
};