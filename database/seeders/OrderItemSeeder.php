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
        // Order ORD123456789 with 2 items
        // Order 1 with 2 items
        OrderItem::create([
            'order_id' => 1,
            'variant_id' => 1,
            'name' => Product::find(Variant::find(1)->product_id)->name,
            'img' => Image::where('product_id', Variant::find(1)->product_id)->first()?->image,
            'varname' => Variant::find(1)->sku,
            'quantity' => 2,
            'price' => Variant::find(1)->price,
        ]);
        OrderItem::create([
            'order_id' => 1,
            'variant_id' => 9,
            'name' => Product::find(Variant::find(9)->product_id)->name,
            'img' => Image::where('product_id', Variant::find(9)->product_id)->first()?->image,
            'varname' => Variant::find(9)->sku,
            'quantity' => 1,
            'price' => Variant::find(9)->price,
        ]);

        // Order 2 with 3 items
        OrderItem::create([
            'order_id' => 2,
            'variant_id' => 13,
            'name' => Product::find(Variant::find(13)->product_id)->name,
            'img' => Image::where('product_id', Variant::find(13)->product_id)->first()?->image,
            'varname' => Variant::find(13)->sku,
            'quantity' => 1,
            'price' => Variant::find(13)->price,
        ]);
        OrderItem::create([
            'order_id' => 2,
            'variant_id' => 12,
            'name' => Product::find(Variant::find(12)->product_id)->name,
            'img' => Image::where('product_id', Variant::find(12)->product_id)->first()?->image,
            'varname' => Variant::find(12)->sku,
            'quantity' => 2,
            'price' => Variant::find(12)->price,
        ]);
        OrderItem::create([
            'order_id' => 2,
            'variant_id' => 27,
            'name' => Product::find(Variant::find(27)->product_id)->name,
            'img' => Image::where('product_id', Variant::find(27)->product_id)->first()?->image,
            'varname' => Variant::find(27)->sku,
            'quantity' => 1,
            'price' => Variant::find(27)->price,
        ]);

        // Order 3 with 1 item
        OrderItem::create([
            'order_id' => 3,
            'variant_id' => 10,
            'name' => Product::find(Variant::find(10)->product_id)->name,
            'img' => Image::where('product_id', Variant::find(10)->product_id)->first()?->image,
            'varname' => Variant::find(10)->sku,
            'quantity' => 1,
            'price' => Variant::find(10)->price,
        ]);
        
    }
}