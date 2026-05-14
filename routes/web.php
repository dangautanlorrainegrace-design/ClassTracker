<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Lab;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $labs = Lab::all(); // Fetch the labs for Arlene's grid
    return view('dashboard', compact('labs'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // --- Raffy's Lab Inventory & Management Routes ---
    
    // 1. Main Inventory List
    Route::get('/labs', [App\Http\Controllers\LabController::class, 'index'])->name('labs.index');
    
    // 2. Labs Schedule (Gina's part, but Raffy needs the link clickable)
    Route::get('/labs/schedule', [App\Http\Controllers\LabController::class, 'schedule'])->name('labs.schedule');
    
    // 3. Labs Report (Arlene's part, but Raffy needs the link clickable)
    Route::get('/labs/report', [App\Http\Controllers\LabController::class, 'report'])->name('labs.report');
    
    // 4. Lab Creation Logic
    Route::post('/labs/store', [App\Http\Controllers\LabController::class, 'store'])->name('labs.store');

    Route::get('/labs/create', [LabController::class, 'create'])->name('labs.create');
Route::post('/labs', [LabController::class, 'store'])->name('labs.store');

// The POST route handles the status change
Route::post('/labs/{id}/toggle', [CheckInController::class, 'toggleStatus'])->name('lab.toggle');
});;

require __DIR__.'/auth.php';
