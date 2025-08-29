<?php

namespace App\Http\Controllers;
use App\Models\Program;
use App\Models\Testimonial;
use App\Models\Feature;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        // Ambil semua data program dari database
        $programs = Program::all(); 
        // Ambil semua data testimoni dari database
        $testimonials = Testimonial::latest()->get();
        // Ambil semua data fitur dari database
        $features = Feature::all();

        // Kirim data program ke view 'landingpage'
        return view('landingpage', [
            'programs' => $programs,
            'testimonials' => $testimonials,
            'features' => $features,
        ]);
    }
}
