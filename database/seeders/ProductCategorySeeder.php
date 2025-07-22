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
            "name" => "Rumah & Hunian",
            "slug" => "rumah-hunian"
        ]);

        ProductCategory::create([
            "name" => "Perlengkapan Kebersihan",
            "slug" => "perlengkapan-kebersihan"
        ]);

        ProductCategory::create([
            "name" => "Kesehatan & Kecantikan",
            "slug" => "kesehatan-kecantikan"
        ]);

        ProductCategory::create([
            "name" => "Dapur",
            "slug" => "dapur"
        ]);

        ProductCategory::create([
            "name" => "Aksesoris",
            "slug" => "aksesoris"
        ]);

    }
}
