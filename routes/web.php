<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeUserController;

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

Route::get('/', [HomeUserController::class, 'index'])->name('user-index');
Route::get('/about', [HomeUserController::class, 'about'])->name('user-about');
Route::get('/services', [HomeUserController::class, 'services'])->name('user-services');
Route::get('/service', [HomeUserController::class, 'serviceDetail'])->name('user-service');
Route::get('/projects', [HomeUserController::class, 'projects'])->name('user-projects');
Route::get('/contact', [HomeUserController::class, 'contact'])->name('user-contact');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';