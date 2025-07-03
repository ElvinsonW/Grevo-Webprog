<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Batch;
use App\Models\Organization;
class BatchSeeder extends Seeder
{
    public function run(): void
    {
        $org = Organization::first();
        //
        Batch::create([
            'organization_id' => $org->organization_id,
            'batchdate' => '20 June - 30 June 2025',
            'dateofactivity' => '2025-06-06',
            'batchproof' => 'batchproof/openmouth.png',
            'treesplanted' => 50
        ]);
        Batch::create([
            'organization_id' => $org->organization_id,
            'batchdate' => '20 June - 30 June 2025',
            'dateofactivity' => '2025-06-06',
            'batchproof' => 'batchproof/openmouth.png',
            'treesplanted' => 50
        ]);
        Batch::create([
            'organization_id' => $org->organization_id,
            'batchdate' => '20 June - 30 June 2025',
            'dateofactivity' => '2025-06-06',
            'batchproof' => 'batchproof/openmouth.png',
            'treesplanted' => 50
        ]);
        Batch::create([
            'organization_id' => $org->organization_id,
            'batchdate' => '20 June - 30 June 2025',
            'dateofactivity' => '2025-06-06',
            'batchproof' => 'batchproof/openmouth.png',
            'treesplanted' => 50
        ]);
        Batch::create([
            'organization_id' => $org->organization_id,
            'batchdate' => '20 June - 30 June 2025',
            'dateofactivity' => '2025-06-06',
            'batchproof' => 'batchproof/openmouth.png',
            'treesplanted' => 50
        ]);
        Batch::create([
            'organization_id' => $org->organization_id,
            'batchdate' => '20 June - 30 June 2025',
            'dateofactivity' => '2025-06-06',
            'batchproof' => 'batchproof/openmouth.png',
            'treesplanted' => 50
        ]);
        Batch::create([
            'organization_id' => $org->organization_id,
            'batchdate' => '20 June - 30 June 2025',
            'dateofactivity' => '2025-06-06',
            'batchproof' => 'batchproof/openmouth.png',
            'treesplanted' => 50
        ]);
        Batch::create([
            'organization_id' => $org->organization_id,
            'batchdate' => '20 June - 30 June 2025',
            'dateofactivity' => '2025-06-06',
            'batchproof' => 'batchproof/openmouth.png',
            'treesplanted' => 50
        ]);
        Batch::create([
            'organization_id' => $org->organization_id,
            'batchdate' => '20 June - 30 June 2025',
            'dateofactivity' => '2025-06-06',
            'batchproof' => 'batchproof/openmouth.png',
            'treesplanted' => 50
        ]);
        Batch::create([
            'organization_id' => $org->organization_id,
            'batchdate' => '20 June - 30 June 2025',
            'dateofactivity' => '2025-06-06',
            'batchproof' => 'batchproof/openmouth.png',
            'treesplanted' => 50
        ]);
        Batch::create([
            'organization_id' => $org->organization_id,
            'batchdate' => '20 June - 30 June 2025',
            'dateofactivity' => '2025-06-06',
            'batchproof' => 'batchproof/openmouth.png',
            'treesplanted' => 50
        ]);
        Batch::create([
            'organization_id' => $org->organization_id,
            'batchdate' => '20 June - 30 June 2025',
            'dateofactivity' => '2025-06-06',
            'batchproof' => 'batchproof/openmouth.png',
            'treesplanted' => 50
        ]);
    }
}
