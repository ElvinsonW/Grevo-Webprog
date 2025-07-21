<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Organization;
use App\Models\Tree;

class TreeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $org = Organization::first();
        $org2 = Organization::skip(1)->first();
        $org3 = Organization::skip(2)->first();
        $org4 = Organization::skip(3)->first();
        $org5 = Organization::skip(4)->first();
        $org6 = Organization::skip(5)->first();
        Tree::create([
            'treename' => 'Mangrove',
            'treecategory' => 'Pinus',
            'treedesc' => 'Pohon liar telah muncul!',
            'treelife' => 20,
            'treeprice' => 20.5,
            'treephoto' => 'treesphoto/close.png',
            'organization_id' => $org->organization_id
        ]);

        Tree::create([
            'treename' => 'Ek',
            'treecategory' => 'Gugur',
            'treedesc' => 'Pohon kokoh yang dikenal dengan kayunya yang kuat.',
            'treelife' => 50,
            'treeprice' => 35.75,
            'treephoto' => 'treesphoto/oak.png',
            'organization_id' => $org2->organization_id
        ]);

        Tree::create([
            'treename' => 'Bambu',
            'treecategory' => 'Rumput',
            'treedesc' => 'Tumbuhan yang tumbuh cepat dan serbaguna.',
            'treelife' => 15,
            'treeprice' => 12.99,
            'treephoto' => 'treesphoto/bamboo.png',
            'organization_id' => $org->organization_id
        ]);

        Tree::create([
            'treename' => 'Cedar',
            'treecategory' => 'Konifer',
            'treedesc' => 'Pohon hijau abadi dengan kayu aromatik.',
            'treelife' => 40,
            'treeprice' => 28.50,
            'treephoto' => 'treesphoto/cedar.png',
            'organization_id' => $org3->organization_id
        ]);

        Tree::create([
            'treename' => 'Baobab',
            'treecategory' => 'Sukulen',
            'treedesc' => 'Pohon ikonik dengan batang tebal.',
            'treelife' => 100,
            'treeprice' => 45.00,
            'treephoto' => 'treesphoto/baobab.png',
            'organization_id' => $org4->organization_id
        ]);

        Tree::create([
            'treename' => 'Kelapa',
            'treecategory' => 'Tropis',
            'treedesc' => 'Pohon tropis yang tinggi dan fleksibel.',
            'treelife' => 30,
            'treeprice' => 22.25,
            'treephoto' => 'treesphoto/palm.png',
            'organization_id' => $org5->organization_id
        ]);

        Tree::create([
            'treename' => 'Akasia',
            'treecategory' => 'Sabana',
            'treedesc' => 'Tumbuh subur di lingkungan kering.',
            'treelife' => 25,
            'treeprice' => 18.80,
            'treephoto' => 'treesphoto/acacia.png',
            'organization_id' => $org6->organization_id
        ]);

        Tree::create([
            'treename' => 'Mapel',
            'treecategory' => 'Gugur',
            'treedesc' => 'Dikenal dengan daun musim gugur yang cerah.',
            'treelife' => 60,
            'treeprice' => 30.00,
            'treephoto' => 'treesphoto/maple.png',
            'organization_id' => $org6->organization_id
        ]);
    }
}
