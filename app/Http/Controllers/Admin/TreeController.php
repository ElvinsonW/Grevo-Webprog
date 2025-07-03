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

    public function show(Request $request)
    {
        // Get all organizations (if you still need them for a filter/dropdown)
        // 1. Fetch all organizations for the filter sidebar.
        $organizations = Organization::all();

        // 2. Start building the query for trees.
        $query = Tree::query();

        // 3. Apply Organization Filter (from URL query parameter 'organization_id')
        $selectedOrganizationId = $request->query('organization_id');
        $selectedOrganization = null; // To pass to the view for UI state
        // Check if a specific organization_id is present AND is not an empty string
        if (!empty($selectedOrganizationId) && $selectedOrganizationId !== '') {
            // Attempt to find the organization
            $selectedOrganization = Organization::find($selectedOrganizationId);

            // --- START DEBUGGING CODE ---
            if ($selectedOrganization) {
                \Log::info('Found Organization in DB: ID=' . $selectedOrganization->organization_id . ', Name=' . $selectedOrganization->organization_name);
                // After finding the organization, let's verify its primary key type if it's not default 'id'
                \Log::info('Primary key of found Organization: ' . $selectedOrganization->getKeyName() . ' = ' . $selectedOrganization->getKey());
            } else {
                \Log::warning('Organization with ID "' . $selectedOrganizationId . '" not found in database.');
            }
            // --- END DEBUGGING CODE ---

            if ($selectedOrganization) {
                // Apply the filter using the correct foreign key column name.
                // Assuming 'organization_id' is the foreign key in the 'trees' table
                // and $selectedOrganization->organization_id is the primary key of the Organization model.
                $query->where('organization_id', $selectedOrganization->organization_id);
                \Log::info('Query WHERE clause added: organization_id = ' . $selectedOrganization->organization_id);
            }
        } else {
            \Log::info('No specific organization filter applied (All Organizations selected or no ID provided).');
        }

        $trees = $query->get();

        // --- START DEBUGGING CODE ---
        \Log::info('Number of trees retrieved after filter: ' . $trees->count());
        // --- END DEBUGGING CODE ---

        return view('User.treecatalogue.tree', [
            'tree' => $trees, // Pass only the FILTERED trees
            'organizations' => $organizations, // Pass ALL organizations for the sidebar
            'selectedOrganization' => $selectedOrganization, // The organization object (or null)
            // REMOVED: 'showOnlyRedeemable' variable
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
            'treelife' => 'required|integer',
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
