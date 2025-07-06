<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Penting untuk mengelola file

class TestimonialController extends Controller
{
    /**
     * Menampilkan daftar testimoni (tidak dipakai di dashboard AJAX, tapi baik untuk ada).
     */
    public function index()
    {
        $testimonials = Testimonial::latest()->get();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    /**
     * Menampilkan form tambah testimoni (tidak dipakai di dashboard AJAX).
     */
    public function create()
    {
        return view('admin.testimonials.create');
    }

    /**
     * Menyimpan testimoni baru dan mengembalikan respons JSON.
     */
    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Simpan gambar ke storage/app/public/testimonials
        $path = $request->file('gambar')->store('testimonials', 'public');

        // Buat record di database
        $testimonial = Testimonial::create([
            'gambar' => $path,
        ]);

        // Kembalikan respons JSON, BUKAN redirect.
        return response()->json([
            'success' => true,
            'message' => 'Testimoni berhasil ditambahkan.',
            'data'    => $testimonial // Kirim kembali data yang baru dibuat
        ]);
    }

    /**
     * Menghapus testimoni dan mengembalikan respons JSON.
     */
    public function destroy(Testimonial $testimonial)
    {
        // Hapus file gambar dari storage terlebih dahulu
        if (Storage::disk('public')->exists($testimonial->gambar)) {
            Storage::disk('public')->delete($testimonial->gambar);
        }

        // Hapus record dari database
        $testimonial->delete();

        // Kembalikan respons JSON, BUKAN redirect.
        return response()->json([
            'success' => true,
            'message' => 'Testimoni berhasil dihapus.'
        ]);
    }
}