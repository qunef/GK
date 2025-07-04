<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;

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
            'fitur' => 'required|string',
            'harga_baru' => 'required|integer',
            'harga_lama' => 'nullable|integer',
        ]);

        // Ubah string fitur (satu per baris) menjadi array JSON
        $fiturArray = array_filter(array_map('trim', explode("\n", $request->fitur)));

        $program = Program::create([
            'nama_kelas' => $request->nama_kelas,
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
            'fitur' => 'required|string',
            'harga_baru' => 'required|integer',
            'harga_lama' => 'nullable|integer',
        ]);

        $fiturArray = array_filter(array_map('trim', explode("\n", $request->fitur)));

        $program->update([
            'nama_kelas' => $request->nama_kelas,
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
