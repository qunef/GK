<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Models\Testimonial;
use App\Models\Feature;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $programs = Program::latest()->get();
        $testimonials = Testimonial::latest()->get();
        $features = Feature::all();

        return view('dashboard', [
            'programs' => $programs,
            'testimonials' => $testimonials,
            'features' => $features,
        ]);
    }
}