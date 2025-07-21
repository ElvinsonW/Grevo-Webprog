<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Batch;
use App\Models\Organization;

class BatchController extends Controller
{
        public function index()
    {
        $query = Batch::query();

        $batches = $query->paginate(10);
        return view('Admin.Batch.listbatch', compact('batches'));
    }

    public function create()
    {
        $organizations = Organization::all();
        return view('Admin.Batch.uploadbatch', compact('organizations'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'organization_id'=>'required|exists:organizations,organization_id',
            'dateofactivity' => 'required|date',
            'treesplanted' => 'required|integer',
            'startdate' => 'required|date',
            'enddate' => 'required|date|after:startdate',
            'batchproof' => 'required|image|mimes:jpg,png,jpeg|max:2048'
        ],[
        // Pesan error dalam Bahasa Indonesia
        'organization_id.required' => 'Organisasi harus dipilih.',
        'dateofactivity.required' => 'Tanggal kegiatan wajib diisi.',
        'treesplanted.required' => 'Jumlah pohon wajib diisi.',
        'startdate.required' => 'Tanggal mulai wajib diisi.',
        'enddate.required' => 'Tanggal akhir wajib diisi.',
        'enddate.after' => 'Tanggal akhir harus setelah tanggal mulai.',
        'batchproof.required' => 'Foto bukti wajib diunggah.',
        'batchproof.image' => 'File harus berupa gambar.',
        'batchproof.mimes' => 'Format gambar harus jpeg, png, atau jpg.',
        'batchproof.max' => 'Ukuran gambar maksimal 2MB.',
    ]);

        if($request->hasFile('batchproof')){
            $validated['batchproof'] = $request->file('batchproof')->store('batchproof','public');
        }

        Batch::create($validated);
        return redirect()->route('admin.batches.listbatch')->with('success','Batch berhasil ditambahkan!');
    }

    public function destroy(string $batchid)
    {
        //
        $batches = Batch::findOrFail($batchid);
        $batches->delete();

        return redirect()->route('Admin.Batch.listbatch')->with('success', 'Batch berhasil dihapus!');
    }
}
