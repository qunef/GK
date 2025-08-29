<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $path = $request->file('gambar')->store('features', 'public');

        $feature = Feature::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar' => $path,
        ]);

        return response()->json($feature);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Feature $feature)
    {
        return response()->json($feature);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Feature $feature)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->only('judul', 'deskripsi');

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama
            if ($feature->gambar) {
                Storage::disk('public')->delete($feature->gambar);
            }
            // Upload gambar baru
            $data['gambar'] = $request->file('gambar')->store('features', 'public');
        }

        $feature->update($data);

        // Mengembalikan data yang sudah diupdate beserta path gambar yang benar
        $feature->gambar_url = asset('storage/' . $feature->gambar);

        return response()->json($feature);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feature $feature)
    {
        if ($feature->gambar) {
            Storage::disk('public')->delete($feature->gambar);
        }
        $feature->delete();

        return response()->json(['success' => 'Fitur berhasil dihapus.']);
    }
}
