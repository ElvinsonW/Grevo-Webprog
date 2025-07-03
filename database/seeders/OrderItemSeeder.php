<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\OrderItem;
use App\Models\ProductVariant as Variant;
use App\Models\Product;
use App\Models\ProductImage as Image;

class OrderItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Order ORD123456789 with 2 items
        OrderItem::create([
            'order_id' => 1,
            'product_id' => 1,
            'variant_id' => 1,
            'name' => Product::find(1)->name,
            'img' => Image::where('product_id', 1)->first()?->image,
            'variant' => Variant::find(1)->sku,
            'quantity' => 2,
            'price' => Variant::find(1)->price,
        ]);
        OrderItem::create([
            'order_id' => 1,
            'product_id' => 2,
            'variant_id' => 2,
            'name' => Product::find(2)->name,
            'img' => Image::where('product_id', 2)->first()?->image,
            'variant' => Variant::find(2)->sku,
            'quantity' => 1,
            'price' => Variant::find(2)->price,
        ]);

        // Order 2 with 3 items
        OrderItem::create([
            'order_id' => 2,
            'product_id' => 1,
            'variant_id' => 1,
            'name' => Product::find(1)->name,
            'img' => Image::where('product_id', 1)->first()?->image,
            'variant' => Variant::find(1)->sku,
            'quantity' => 1,
            'price' => Variant::find(1)->price,
        ]);
        OrderItem::create([
            'order_id' => 2,
            'product_id' => 2,
            'variant_id' => 2,
            'name' => Product::find(2)->name,
            'img' => Image::where('product_id', 2)->first()?->image,
            'variant' => Variant::find(2)->sku,
            'quantity' => 2,
            'price' => Variant::find(2)->price,
        ]);
        OrderItem::create([
            'order_id' => 2,
            'product_id' => 3,
            'variant_id' => 3,
            'name' => Product::find(3)->name,
            'img' => Image::where('product_id', 3)->first()?->image,
            'variant' => Variant::find(3)->sku,
            'quantity' => 1,
            'price' => Variant::find(3)->price,
        ]);

        // Order 3 with 1 item
        OrderItem::create([
            'order_id' => 3,
            'product_id' => 1,
            'variant_id' => 1,
            'name' => Product::find(1)->name,
            'img' => Image::where('product_id', 1)->first()?->image,
            'variant' => Variant::find(1)->sku,
            'quantity' => 1,
            'price' => Variant::find(1)->price,
        ]);
        
    }
}