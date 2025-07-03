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
        Tree::create([
            'treename' => 'Mangrove',
            'treecategory' => 'Pine',
            'treedesc' => 'A wild tree has appeared!',
            'treelife' => 20,
            'treeprice' => 20.5,
            'treephoto' => 'treesphoto/close.png',
            'organization_id' => $org->organization_id
        ]);
        Tree::create([
            'treename' => 'Mangrove',
            'treecategory' => 'Pine',
            'treedesc' => 'A wild tree has appeared!',
            'treelife' => 20,
            'treeprice' => 20.5,
            'treephoto' => 'treesphoto/close.png',
            'organization_id' => $org->organization_id
        ]);
        Tree::create([
            'treename' => 'Mangrove',
            'treecategory' => 'Pine',
            'treedesc' => 'A wild tree has appeared!',
            'treelife' => 20,
            'treeprice' => 20.5,
            'treephoto' => 'treesphoto/close.png',
            'organization_id' => $org->organization_id
        ]);
        Tree::create([
            'treename' => 'Mangrove',
            'treecategory' => 'Pine',
            'treedesc' => 'A wild tree has appeared!',
            'treelife' => 20,
            'treeprice' => 20.5,
            'treephoto' => 'treesphoto/close.png',
            'organization_id' => $org->organization_id
        ]);
        Tree::create([
            'treename' => 'Mangrove',
            'treecategory' => 'Pine',
            'treedesc' => 'A wild tree has appeared!',
            'treelife' => 20,
            'treeprice' => 20.5,
            'treephoto' => 'treesphoto/close.png',
            'organization_id' => $org->organization_id
        ]);
        Tree::create([
            'treename' => 'Mangrove',
            'treecategory' => 'Pine',
            'treedesc' => 'A wild tree has appeared!',
            'treelife' => 20,
            'treeprice' => 20.5,
            'treephoto' => 'treesphoto/close.png',
            'organization_id' => $org->organization_id
        ]);
        Tree::create([
            'treename' => 'Mangrove',
            'treecategory' => 'Pine',
            'treedesc' => 'A wild tree has appeared!',
            'treelife' => 20,
            'treeprice' => 20.5,
            'treephoto' => 'treesphoto/close.png',
            'organization_id' => $org->organization_id
        ]);
        Tree::create([
            'treename' => 'Mangrove',
            'treecategory' => 'Pine',
            'treedesc' => 'A wild tree has appeared!',
            'treelife' => 20,
            'treeprice' => 20.5,
            'treephoto' => 'treesphoto/close.png',
            'organization_id' => $org->organization_id
        ]);
        Tree::create([
            'treename' => 'Mangrove',
            'treecategory' => 'Pine',
            'treedesc' => 'A wild tree has appeared!',
            'treelife' => 20,
            'treeprice' => 20.5,
            'treephoto' => 'treesphoto/close.png',
            'organization_id' => $org->organization_id
        ]);
        Tree::create([
            'treename' => 'Mangrove',
            'treecategory' => 'Pine',
            'treedesc' => 'A wild tree has appeared!',
            'treelife' => 20,
            'treeprice' => 20.5,
            'treephoto' => 'treesphoto/close.png',
            'organization_id' => $org->organization_id
        ]);
        Tree::create([
            'treename' => 'Mangrove',
            'treecategory' => 'Pine',
            'treedesc' => 'A wild tree has appeared!',
            'treelife' => 20,
            'treeprice' => 20.5,
            'treephoto' => 'treesphoto/close.png',
            'organization_id' => $org->organization_id
        ]);
        Tree::create([
            'treename' => 'Mangrove',
            'treecategory' => 'Pine',
            'treedesc' => 'A wild tree has appeared!',
            'treelife' => 20,
            'treeprice' => 20.5,
            'treephoto' => 'treesphoto/close.png',
            'organization_id' => $org->organization_id
        ]);
        
    }
}
