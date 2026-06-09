<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;
use App\Http\Controllers\BasicController;
use App\Http\Controllers\OptionalController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NoteController;

// Route::get('/', function () {
//     return Inertia::render('welcome', [
//         'canRegister' => Features::enabled(Features::registration()),
//     ]);
// })->name('home');

// ============================================
// NOTES ROUTES - Protected by auth middleware
// ============================================
Route::middleware(['auth'])->group(function () {
    Route::resource('notes', NoteController::class);
});
Route::get('/', [NoteController::class, 'index'])->name('notes.home');
Route::view('/offline', 'offline')->name('offline');

Route::get('dashboard', function () {
    return Inertia::render('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// ============================================
// BASIC ROUTES - Simple GET and POST routes
// ============================================
Route::get('/basic', [BasicController::class, 'index'])->name('basic.index');
Route::get('/basic/{id}', [BasicController::class, 'show'])->name('basic.show');

// ============================================
// OPTIONAL ROUTES - Parameters with ? are optional
// ============================================
Route::get('/optional/{id?}/{slug?}', [OptionalController::class, 'show'])->name('optional.show');

// ============================================
// RESOURCE ROUTES - RESTful routes with all CRUD methods
// ============================================
Route::resource('products', ProductController::class);

// ============================================
// GROUPED ROUTES - Admin routes with prefix and middleware
// ============================================
Route::prefix('admin')
    ->middleware(['web']) // Optional: add auth middleware in production
    ->name('admin.')
    ->group(function () {
        Route::resource('categories', CategoryController::class);
    });

require __DIR__ . '/settings.php';
