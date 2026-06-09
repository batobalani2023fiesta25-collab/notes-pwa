<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;

// Root: redirect authenticated users to notes, show landing page for guests
Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('notes.index');
    }
    return view('landing');
})->name('home');

// Notes CRUD - protected by auth middleware
Route::middleware(['auth'])->group(function () {
    Route::resource('notes', NoteController::class);
});

// PWA offline fallback page
Route::view('/offline', 'offline')->name('offline');

require __DIR__ . '/settings.php';
