<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\StatusHistory;

class StatusHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Order 1: 5 statuses, each 2 days apart
        StatusHistory::create([
            'order_id' => 1,
            'status' => 'ORDER PLACED',
            'changed_at' => now(),
        ]);
        StatusHistory::create([
            'order_id' => 1,
            'status' => 'ORDER SHIPPED',
            'changed_at' => now()->addMinutes(50)->addDays(2),
        ]);
        StatusHistory::create([
            'order_id' => 1,
            'status' => 'ORDER ARRIVED',
            'changed_at' => now()->addMinutes(143)->addDays(4),
        ]);
        StatusHistory::create([
            'order_id' => 1,
            'status' => 'ORDER RECEIVED',
            'changed_at' => now()->addMinutes(203)->addDays(4),
        ]);
        StatusHistory::create([
            'order_id' => 1,
            'status' => 'ORDER COMPLETED',
            'changed_at' => now()->addMinutes(203)->addDays(7),
        ]);

        // Order 2: up to ORDER SHIPPED, 2 days apart
        StatusHistory::create([
            'order_id' => 2,
            'status' => 'ORDER PLACED',
            'changed_at' => now()->addMinutes(3)->addDays(1),
        ]);
        StatusHistory::create([
            'order_id' => 2,
            'status' => 'ORDER SHIPPED',
            'changed_at' => now()->addMinutes(74)->addDays(2),
        ]);

        // Order 3: only ORDER PLACED
        StatusHistory::create([
            'order_id' => 3,
            'status' => 'ORDER PLACED',
            'changed_at' => now()->addMinutes(97)->addDays(2),
        ]);
    }
}
