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

Route::get('/', function () {
    return view('welcome');
}) ->name('home');

Route::get('/dashboard', function () {

    return view('dashboard');
    
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/additive/{additive}', [AdditivesController::class, 'show'])->middleware(['auth', 'verified'])->name('additive.show');

Route::get('/edit/{additive}', [AdditivesController::class, 'edit'])->middleware(['auth', 'verified'])->name('additive.edit');

Route::patch('/additive', [AdditivesController::class, 'update'])->middleware(['auth', 'verified'])->name('additive.update');

Route::get('/additives', [AdditivesController::class, 'index'])->middleware(['auth', 'verified'])->name('additive.index');

Route::get('/api/all', [AdditivesController::class, 'api_index'])->name('api.all');

Route::get('/api/{additive}', [AdditivesController::class, 'api_show'])->name('api.show');


require __DIR__.'/auth.php';
