<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::latest()->get();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.testimonials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Simpan gambar ke storage/app/public/testimonials
        $path = $request->file('gambar')->store('testimonials', 'public');

        Testimonial::create([
            'gambar' => $path,
        ]);

        return redirect()->route('testimonials.index')->with('success', 'Testimoni berhasil ditambahkan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonial)
    {
        // Hapus file gambar dari storage
        Storage::disk('public')->delete($testimonial->gambar);

        // Hapus record dari database
        $testimonial->delete();

        return redirect()->route('testimonials.index')->with('success', 'Testimoni berhasil dihapus.');
    }
}
