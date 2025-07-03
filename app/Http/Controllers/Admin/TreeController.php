<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tree;
use App\Models\Organization;
use Illuminate\Support\Facades\Log; // Pastikan ini ada

class TreeController extends Controller
{
    public function index()
    {
        $query = Tree::query();
        $trees = $query->paginate(10);
        return view('Admin.Tree.listtree', compact('trees'));
    }

    public function show(Request $request)
    {
        // --- START DEBUGGING CODE ---
        Log::info('--- TreeCatalogue (Admin\TreeController@show) ---');
        Log::info('All Request Parameters: ' . json_encode($request->all()));

        $selectedOrganizationId = $request->query('organization_id');
        Log::info('Received organization_id in request: ' . ($selectedOrganizationId ?? 'NULL/EMPTY'));
        Log::info('Type of received organization_id: ' . gettype($selectedOrganizationId));
        // --- END DEBUGGING CODE ---

        $organizations = Organization::all();
        $query = Tree::query();
        $selectedOrganization = null;

        // Check if a specific organization_id is present AND is not an empty string
        if (!empty($selectedOrganizationId)) {
            // Attempt to find the organization by its primary key
            $selectedOrganization = Organization::find($selectedOrganizationId);

            // --- START DEBUGGING CODE ---
            if ($selectedOrganization) {
                Log::info('Found Organization in DB: ID=' . $selectedOrganization->organization_id . ', Name=' . $selectedOrganization->organization_name);
                Log::info('Primary key of found Organization: ' . $selectedOrganization->getKeyName() . ' = ' . $selectedOrganization->getKey());
            } else {
                Log::warning('Organization with ID "' . $selectedOrganizationId . '" not found in database. This might indicate incorrect data or model PK configuration.');
            }
            // --- END DEBUGGING CODE ---

            if ($selectedOrganization) {
                // Apply the filter: 'organization_id' is the foreign key in the 'trees' table
                // and $selectedOrganization->organization_id is the primary key of the Organization model.
                $query->where('organization_id', $selectedOrganization->organization_id);
                Log::info('Query WHERE clause added: organization_id = ' . $selectedOrganization->organization_id);
            }
        } else {
            Log::info('No specific organization filter applied (All Organizations selected or no ID provided).');
        }

        // Get the filtered trees.
        $trees = $query->get(); // <--- Ini adalah baris 97 di contoh kode saya sebelumnya.
                               // Anda bisa membiarkannya 'get()' atau mengganti ke 'paginate(10)'
                               // jika Anda ingin pagination di tampilan user.
        // --- START DEBUGGING CODE ---
        Log::info('Number of trees retrieved after filter: ' . $trees->count());
        Log::info('--- End TreeCatalogue ---');
        // --- END DEBUGGING CODE ---

        return view('User.treecatalogue.tree', [
            'tree' => $trees,
            'organizations' => $organizations,
            'selectedOrganization' => $selectedOrganization,
        ]);
    }

    public function create()
    {
        $organizations = Organization::all();
        return view('Admin.Tree.addtree', compact('organizations'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'treename' => 'required|string|max:255',
            'treecategory' => 'required|string|max:255',
            'treedesc' => 'required|string',
            'treelife' => 'required|integer',
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
            'treelife' => 'required|integer',
            'treeprice' => 'required|decimal:0,5',
            'organization_id' => 'required|exists:organizations,organization_id',
            'treephoto' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $tree = Tree::findOrFail($treeid);

        if($request->hasFile('treephoto')){
            if ($tree->treephoto) {
                \Storage::disk('public')->delete($tree->treephoto);
            }
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
        if ($tree->treephoto) {
            \Storage::disk('public')->delete($tree->treephoto);
        }
        $tree->delete();

        return redirect()->route('tree.listtree')->with('success', 'Tree Deleted Successfully!');
    }
}