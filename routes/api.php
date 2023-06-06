<?php

use App\Http\Controllers\AdditivesApiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/all', [AdditivesApiController::class, 'index'])->name('api.all');

Route::get('/{additive}', [AdditivesApiController::class, 'show'])->name('api.show');
