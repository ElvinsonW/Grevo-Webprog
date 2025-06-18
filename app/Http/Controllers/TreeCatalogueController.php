<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\Tree; // Uncomment this if you have a Tree model
// use Illuminate\Support\Facades\Auth; // Uncomment if you need user data

class TreeCatalogueController extends Controller
{
    /**
     * Display a listing of the trees.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // --- Contoh data pohon (placeholder) ---
        // Dalam aplikasi nyata, Anda akan mengambil data ini dari database.
        // Contoh: $trees = Tree::all(); // Jika Anda memiliki model Tree
        $trees = [
            ['name' => 'Natural Body Wash', 'price' => '20.000', 'description' => 'lorem ipsum blablabla lorem ipsum blablabla', 'image' => 'images/product-placeholder.jpg'],
            ['name' => 'Cotton Pad', 'price' => '20.000', 'description' => 'lorem ipsum blablabla lorem ipsum blablabla', 'image' => 'images/product-placeholder.jpg'],
            ['name' => 'Natural Body Wash', 'price' => '20.000', 'description' => 'lorem ipsum blablabla lorem ipsum blablabla', 'image' => 'images/product-placeholder.jpg'],
            ['name' => 'Greenish Totebag', 'price' => '20.000', 'description' => 'lorem ipsum blablabla lorem ipsum blablabla', 'image' => 'images/product-placeholder.jpg'],
            ['name' => 'Natural Body Wash', 'price' => '20.000', 'description' => 'lorem ipsum blablabla lorem ipsum blablabla', 'image' => 'images/product-placeholder.jpg'],
            ['name' => 'Cotton Pad', 'price' => '20.000', 'description' => 'lorem ipsum blablabla lorem ipsum blablabla', 'image' => 'images/product-placeholder.jpg'],
            ['name' => 'Natural Body Wash', 'price' => '20.000', 'description' => 'lorem ipsum blablabla lorem ipsum blablabla', 'image' => 'images/product-placeholder.jpg'],
            ['name' => 'Greenish Totebag', 'price' => '20.000', 'description' => 'lorem ipsum blablabla lorem ipsum blablabla', 'image' => 'images/product-placeholder.jpg'],
        ];

        // Contoh untuk mendapatkan data user jika diperlukan di halaman katalog
        // $user = Auth::user();

        return view('User.treecatalogue.tree', [
            'trees' => $trees,
            // 'user' => $user // uncomment this line if you pass user data
        ]);
    }
}