<?php
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\ProgramController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FeatureController;
use Illuminate\Support\Facades\Route;


Route::get('/', [LandingPageController::class, 'index']);
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    //admin routes
    Route::resource('admin/programs', ProgramController::class);
    Route::resource('admin/testimonials', TestimonialController::class);
    Route::resource('admin/features', FeatureController::class);
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
