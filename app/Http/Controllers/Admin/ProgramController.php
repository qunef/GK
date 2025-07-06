<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programs = Program::latest()->get(); // Ambil data program, urutkan dari yang terbaru
        return view('admin.programs.index', compact('programs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.programs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required|string|max:255',
            'periode_kelas' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'fitur' => 'required|string',
            'harga_baru' => 'required|integer',
            'harga_lama' => 'nullable|integer',
        ]);
        // Simpan gambar jika ada
        // Jika tidak ada gambar, set ke null
        // Gunakan store() untuk menyimpan file ke storage/app/public/programs
        // Pastikan direktori 'public/programs' sudah ada
        // Jika tidak ada gambar, set ke null
        // Jika ada gambar, simpan dan ambil path-nya
        // Gunakan 'public' disk untuk menyimpan file di storage/app/public/programs
        $pathGambar = null;
        if ($request->hasFile('gambar')) {
            $pathGambar = $request->file('gambar')->store('programs', 'public');
        }

        // Ubah string fitur (satu per baris) menjadi array JSON
        // Gunakan array_filter untuk menghapus baris kosong
        // Gunakan array_map untuk menghapus spasi di awal dan akhir setiap baris
        // Gunakan explode untuk memecah string berdasarkan baris baru
        // Simpan fitur sebagai JSON
        // Gunakan json_encode untuk mengubah array menjadi string JSON
        $fiturArray = array_filter(array_map('trim', explode("\n", $request->fitur)));

        $program = Program::create([
            'nama_kelas' => $request->nama_kelas,
            'gambar' => $pathGambar, // Simpan path gambar
            'periode_kelas' => $request->periode_kelas,
            'fitur' => json_encode($fiturArray),
            'harga_baru' => $request->harga_baru,
            'harga_lama' => $request->harga_lama,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Program berhasil ditambahkan.',
            'data'    => $program
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Program $program)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Program $program)
    {
        return response()->json($program);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Program $program)
    {
        $request->validate([
            'nama_kelas' => 'required|string|max:255',
            'periode_kelas' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'fitur' => 'required|string',
            'harga_baru' => 'required|integer',
            'harga_lama' => 'nullable|integer',
        ]);

        $pathGambar = $program->gambar; // Gunakan gambar lama sebagai default
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($program->gambar) {
                Storage::disk('public')->delete($program->gambar);
            }
            // Upload gambar baru
            $pathGambar = $request->file('gambar')->store('programs', 'public');
        }

        // Ubah string fitur (satu per baris) menjadi array JSON
        $fiturArray = array_filter(array_map('trim', explode("\n", $request->fitur)));

        $program->update([
            'nama_kelas' => $request->nama_kelas,
            'gambar' => $pathGambar, // Simpan path gambar baru atau tetap yang lama
            'periode_kelas' => $request->periode_kelas,
            'fitur' => json_encode($fiturArray),
            'harga_baru' => $request->harga_baru,
            'harga_lama' => $request->harga_lama,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Program berhasil diperbarui.',
            'data'    => $program
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Program $program)
    {
        $program->delete();
        return response()->json([
            'success' => true,
            'message' => 'Program berhasil dihapus.',
            'data'    => $program
        ]);
    }
}
