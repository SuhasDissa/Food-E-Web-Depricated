<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdditivesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AdditivesController::class, 'statistics'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/additive/{additive}', [AdditivesController::class, 'show'])->name('additive.show');

Route::get('/edit/{additive}', [AdditivesController::class, 'edit'])->middleware(['auth', 'verified'])->name('additive.edit');

Route::patch('/additive', [AdditivesController::class, 'update'])->middleware(['auth', 'verified'])->name('additive.update');

Route::get('/additives', [AdditivesController::class, 'index'])->name('additive.index');

require __DIR__.'/auth.php';
