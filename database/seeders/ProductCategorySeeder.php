<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductCategory::create([
            "name" => "Home & Living",
            "slug" => "home-living"
        ]);

        ProductCategory::create([
            "name" => "Cleaning Supplies",
            "slug" => "cleaning-supplies"
        ]);

        ProductCategory::create([
            "name" => "Health & Beauty",
            "slug" => "health-beauty"
        ]);

        ProductCategory::create([
            "name" => "Kitchen",
            "slug" => "kitchen"
        ]);

        ProductCategory::create([
            "name" => "Accessories",
            "slug" => "accessories"
        ]);
    }
}
