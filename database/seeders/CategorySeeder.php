<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Electronics',
            'Books',
            'Clothing',
            'Home & Kitchen',
            'Beauty',
            'Toys & Games',
            'Sports',
            'Automotive',
        ];

        foreach ($categories as $name) {
            DB::table('categories')->insert([
                'name' => $name,
                'slug' => Str::slug($name),
                'image_path' => null, // or set a default path like 'images/categories/' . Str::slug($name) . '.jpg'
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}