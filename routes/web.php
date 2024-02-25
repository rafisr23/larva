<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\HomeUserController;
use App\Http\Controllers\HeaderPageImageController;
use App\Http\Controllers\PageImageCategoryController;

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

// route grouo middleware
Route::middleware(['web'])->group(function () {
    Route::get('/', [HomeUserController::class, 'index'])->name('user-index');
    Route::get('/about', [HomeUserController::class, 'about'])->name('user-about');
    Route::get('/services', [HomeUserController::class, 'services'])->name('user-services');
    // Route::get('/service', [HomeUserController::class, 'serviceDetail'])->name('user-service');
    Route::get('/projects', [HomeUserController::class, 'projects'])->name('user-projects');
    Route::get('/project/{project}', [HomeUserController::class, 'projectDetail'])->name('user-project-detail');
    Route::get('/contact', [HomeUserController::class, 'contact'])->name('user-contact');
});

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
            Route::get('/get-services', 'getServices')->name('.get-services');
            Route::get('/create', 'create')->name('.create');
            Route::post('/store', 'store')->name('.store');
            Route::get('/{service}/edit', 'edit')->name('.edit');
            Route::patch('/{service}', 'update')->name('.update');
            Route::put('/{service}/update-status', 'updateStatus')->name('.update-status');
            Route::put('/{imageId}/update-status-image', 'updateStatusImage')->name('.update-status-image');
            Route::delete('/{service}', 'destroy')->name('.destroy');
            Route::delete('/{imageId}/destroy-image', 'destroyImage')->name('.destroy-image');
            Route::get('/{service}/team', 'team')->name('.team');
            Route::get('/{service}/team/get', 'getTeams')->name('.get-teams');
            Route::post('/{service}/team/store', 'storeTeam')->name('.store-team');
            Route::get('/{service}/team/{id}/get-one', 'getOneTeam')->name('.get-one-team');
            Route::put('/{service}/team/{id}/update', 'updateTeam')->name('.update-team');
            Route::delete('/{service}/team/{id}/destroy', 'destroyTeam')->name('.destroy-team');
        });
        
        Route::controller(ProjectController::class)->prefix('project')->name('project')->group(function () {
            Route::get('/', 'index')->name('.index');
            Route::get('/get-projects', 'getProjects')->name('.get-projects');
            Route::get('/create', 'create')->name('.create');
            Route::post('/store', 'store')->name('.store');
            Route::get('/{project}/edit', 'edit')->name('.edit');
            Route::put('/{project}', 'update')->name('.update');
            Route::put('/{project}/update-status', 'updateStatus')->name('.update-status');
            Route::put('/{imageId}/update-status-image', 'updateStatusImage')->name('.update-status-image');
            Route::delete('/{project}', 'destroy')->name('.destroy');
            Route::delete('/{imageId}/destroy-image', 'destroyImage')->name('.destroy-image');
        });
        
        Route::controller(PartnerController::class)->prefix('partner')->name('partner')->group(function () {
            Route::get('/', 'index')->name('.index');
            Route::get('/get-partners', 'getPartners')->name('.get-partners');
            Route::get('/create', 'create')->name('.create');
            Route::post('/store', 'store')->name('.store');
            Route::get('/{partner}/edit', 'edit')->name('.edit');
            Route::put('/{partner}', 'update')->name('.update');
            Route::put('/{partner}/update-status', 'updateStatus')->name('.update-status');
            Route::delete('/{partner}', 'destroy')->name('.destroy');
        });
        
        Route::controller(ContactController::class)->prefix('contact')->name('contact')->group(function () {
            Route::get('/', 'index')->name('.index');
            Route::post('/store', 'store')->name('.store');
        });
        
        Route::controller(PageImageCategoryController::class)->prefix('image-category')->name('image-category')->group(function () {
            Route::get('/', 'index')->name('.index');
            Route::get('/get-image-categories', 'getImageCategories')->name('.get-image-categories');
            Route::post('/store', 'store')->name('.store');
            Route::put('/{imageCategory}', 'update')->name('.update');
            Route::put('/{imageCategory}/update-status', 'updateStatus')->name('.update-status');
            Route::delete('/{imageCategory}', 'destroy')->name('.destroy');
            Route::get('/{imageCategory}/get-one', 'getOne')->name('.get-one');
        });

        Route::controller(HeaderPageImageController::class)->prefix('page-image')->name('page-image')->group(function () {
            Route::get('/', 'index')->name('.index');
            Route::get('/get-header-page-images', 'getHeaderPageImages')->name('.get-header-page-images');
            Route::post('/store', 'store')->name('.store');
            Route::put('/{id}', 'update')->name('.update');
            Route::put('/{id}/update-status', 'updateStatus')->name('.update-status');
            Route::delete('/{id}', 'destroy')->name('.destroy');
            Route::get('/{id}/get-one', 'getOne')->name('.get-one');
        });



    });
});


require __DIR__.'/auth.php';