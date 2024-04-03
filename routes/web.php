<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserContactController;
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
    return view('homepage');
});

Route::get('/dashboard',  [UserContactController::class, 'show']
)->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/contact', [UserContactController::class, 'add'])->name('contact.add');
    Route::post('/contact', [UserContactController::class, 'store'])->name('contact.save');
    Route::delete('/contact/{id}', [UserContactController::class, 'destroy'])->name('contact.destroy');
});

require __DIR__.'/auth.php';