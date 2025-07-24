<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TreeOrder;
use App\Models\Tree;
use App\Models\User;

class TreeOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tree1 = Tree::first();
        $tree2 = Tree::skip(1)->first();
        $tree3 = Tree::skip(2)->first();
        $tree4 = Tree::skip(3)->first();
        $tree5 = Tree::skip(4)->first();
        $tree6 = Tree::skip(5)->first();
        $tree7 = Tree::skip(6)->first();
        $tree8 = Tree::skip(7)->first();

        $user = User::find(2);

        TreeOrder::create([
            'user_id' => $user->id,
            'tree_id' => $tree1->treeid,
            'amount' => 2,
            'total_price' => $tree1->treeprice * 2,
        ]);
        TreeOrder::create([
            'user_id' => $user->id,
            'tree_id' => $tree2->treeid,
            'amount' => 1,
            'total_price' => $tree2->treeprice * 1,
        ]);
        TreeOrder::create([
            'user_id' => $user->id,
            'tree_id' => $tree3->treeid,
            'amount' => 3,
            'total_price' => $tree3->treeprice * 3,
        ]);
        TreeOrder::create([
            'user_id' => $user->id,
            'tree_id' => $tree4->treeid,
            'amount' => 5,
            'total_price' => $tree4->treeprice * 5,
        ]);
        TreeOrder::create([
            'user_id' => $user->id,
            'tree_id' => $tree5->treeid,
            'amount' => 4,
            'total_price' => $tree5->treeprice * 4,
        ]);
        TreeOrder::create([
            'user_id' => $user->id,
            'tree_id' => $tree6->treeid,
            'amount' => 2,
            'total_price' => $tree6->treeprice * 2,
        ]);
        TreeOrder::create([
            'user_id' => $user->id,
            'tree_id' => $tree7->treeid,
            'amount' => 1,
            'total_price' => $tree7->treeprice * 1,
        ]);
        TreeOrder::create([
            'user_id' => $user->id,
            'tree_id' => $tree8->treeid,
            'amount' => 3,
            'total_price' => $tree8->treeprice * 3,
        ]);
    }
}
