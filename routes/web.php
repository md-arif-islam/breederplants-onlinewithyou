<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Backend\AdminBreederController;
use App\Http\Controllers\Backend\AdminGrowerController;
use App\Http\Controllers\Backend\AdminVarietyReportController;
use App\Http\Controllers\Backend\AdminVarietySampleController;
use App\Http\Controllers\Frontend\VarietyReportController;
use App\Http\Controllers\Frontend\VarietySampleController;
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

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


Route::middleware(['auth'])->group(function () {


    Route::get('/', [VarietyReportController::class, 'index'])->name('frontend.variety-reports.index');
    Route::get('/variety-reports/{id}', [VarietyReportController::class, 'show'])->name('frontend.variety-reports.show');
    Route::get('/variety-reports/{id}/edit', [VarietyReportController::class, 'edit'])->name('frontend.variety-reports.edit');
    Route::put('/variety-reports/{id}', [VarietyReportController::class, 'update'])->name('frontend.variety-reports.update');

    Route::get('/variety-samples/create', [VarietySampleController::class, 'create'])->name('frontend.variety-samples.create');
    Route::get('/variety-samples/{id}', [VarietySampleController::class, 'show'])->name('frontend.variety-samples.show');
    Route::get('/variety-samples/{id}/edit', [VarietySampleController::class, 'edit'])->name('frontend.variety-samples.edit');
    Route::put('/variety-samples/{id}', [VarietySampleController::class, 'update'])->name('frontend.variety-samples.update');
    Route::delete('/variety-samples/{id}', [VarietySampleController::class, 'destroy'])->name('frontend.variety-samples.destroy');

});


Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('backend.pages.dashboard');
    })->name('dashboard');

    Route::get('/variety-reports', [AdminVarietyReportController::class, 'index'])->name('variety-reports.index');
    Route::get('/variety-reports/create', [AdminVarietyReportController::class, 'create'])->name('variety-reports.create');
    Route::post('/variety-reports', [AdminVarietyReportController::class, 'store'])->name('variety-reports.store');
    Route::get('/variety-reports/{id}', [AdminVarietyReportController::class, 'show'])->name('variety-reports.show');
    Route::get('/variety-reports/{id}/edit', [AdminVarietyReportController::class, 'edit'])->name('variety-reports.edit');
    Route::put('/variety-reports/{id}', [AdminVarietyReportController::class, 'update'])->name('variety-reports.update');
    Route::delete('/variety-reports/{id}', [AdminVarietyReportController::class, 'destroy'])->name('variety-reports.destroy');

    Route::get('/variety-samples/{id}', [AdminVarietySampleController::class, 'show'])->name('variety-samples.show');
    Route::get('/variety-samples/create', [AdminVarietySampleController::class, 'create'])->name('variety-samples.create');
    Route::get('/variety-samples/{id}/edit', [AdminVarietySampleController::class, 'edit'])->name('variety-samples.edit');
    Route::put('/variety-samples/{id}', [AdminVarietySampleController::class, 'update'])->name('variety-samples.update');
    Route::delete('/variety-samples/{id}', [AdminVarietySampleController::class, 'destroy'])->name('variety-samples.destroy');


    // Grower Routes
    Route::get('/growers', [AdminGrowerController::class, 'index'])->name('growers.index');
    Route::get('/growers/create', [AdminGrowerController::class, 'create'])->name('growers.create');
    Route::post('/growers', [AdminGrowerController::class, 'store'])->name('growers.store');
    Route::get('/growers/{grower}/edit', [AdminGrowerController::class, 'edit'])->name('growers.edit');
    Route::put('/growers/{grower}', [AdminGrowerController::class, 'update'])->name('growers.update');
    Route::delete('/growers/{grower}', [AdminGrowerController::class, 'destroy'])->name('growers.destroy');
    Route::put('growers/{grower}/updatePassword', [AdminGrowerController::class, 'updatePassword'])->name('growers.updatePassword');


    // Breeder Routes
    Route::get('/breeders', [AdminBreederController::class, 'index'])->name('breeders.index');
    Route::get('/breeders/create', [AdminBreederController::class, 'create'])->name('breeders.create');
    Route::post('/breeders', [AdminBreederController::class, 'store'])->name('breeders.store');
    Route::get('/breeders/{breeder}/edit', [AdminBreederController::class, 'edit'])->name('breeders.edit');
    Route::put('/breeders/{breeder}', [AdminBreederController::class, 'update'])->name('breeders.update');
    Route::delete('/breeders/{breeder}', [AdminBreederController::class, 'destroy'])->name('breeders.destroy');
    Route::put('breeders/{breeder}/updatePassword', [AdminBreederController::class, 'updatePassword'])->name('breeders.updatePassword');
});


// Clear all caches
Route::get('/clear', function () {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    return "Cleared!";
});
