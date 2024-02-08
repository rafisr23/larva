<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});

Route::group(['middleware' => ['web', 'auth', 'role:superadmin|admin']], function () {
    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::view('/dashboard', 'admin.dashboard')->name('dashboard');
        
        Route::controller(ServiceController::class)->prefix('service')->name('service')->group(function () {
            Route::get('/', 'index')->name('.index');
            Route::get('/create', 'create')->name('.create');
            Route::post('/store', 'store')->name('.store');
            Route::get('/{service}/edit', 'edit')->name('.edit');
            Route::patch('/{service}', 'update')->name('.update');
            Route::delete('/{service}', 'destroy')->name('.destroy');
        });
    });

});


require __DIR__.'/auth.php';