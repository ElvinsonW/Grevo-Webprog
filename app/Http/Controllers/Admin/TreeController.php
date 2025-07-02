<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tree;
use App\Models\Organization;

class TreeController extends Controller
{
    public function index()
    {
        $query = Tree::query();
        $trees = $query->paginate(10);
        return view('Admin.Tree.listtree', compact('trees'));
    }

    public function create()
    {
        //
        $organizations = Organization::all();
        return view('Admin.Tree.addtree', compact('organizations'));
    }

    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'treename' => 'required|string|max:255',
            'treecategory' => 'required|string|max:255',
            'treedesc' => 'required|string',
            'treelife' => 'required|string',
            'treeprice' => 'required|decimal:0,5',
            'organization_id' => 'required|exists:organizations,organization_id',
            'treephoto' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if($request->hasFile('treephoto')){
            $validated['treephoto'] = $request->file('treephoto')->store('treesphoto','public');
        }

        Tree::create($validated);
        
        return redirect()->route('tree.listtree')->with('success', 'Tree Added Successfully!');
    }


    public function edit(string $treeid)
    {
        //
        $trees = Tree::findOrFail($treeid);
        $organizations = Organization::all();
        return view('Admin.Tree.edittree', compact('trees','organizations'));
    }

    public function update(Request $request, string $treeid)
    {

        $validated = $request->validate([
            'treename' => 'required|string|max:255',
            'treecategory' => 'required|string|max:255',
            'treedesc' => 'required|string',
            'treelife' => 'required|string',
            'treeprice' => 'required|decimal:0,5',
            'organization_id' => 'required|exists:organizations,organization_id',
            'treephoto' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $tree = Tree::findOrFail($treeid);

        if($request->hasFile('treephoto')){
            $photo = $request->file('treephoto');
            $filename = time().'_'.$photo->getClientOriginalName();
            $path = $request->file('treephoto')->store('treesphoto', 'public');
            $validated['treephoto'] = $path;
        }else{
            $validated['treephoto'] = $tree->treephoto;
        }

        $tree->update($validated);
        return redirect()->route('tree.listtree')->with('success', 'Tree Updated Successfully');
    }

    public function destroy(string $treeid)
    {
        $tree = Tree::findOrFail($treeid);
        $tree->delete();

        return redirect()->route('tree.listtree')->with('success', 'Tree Deleted Successfully!');
    }
}
