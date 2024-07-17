<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Backend\BreederController;
use App\Http\Controllers\Backend\GrowerController;
use App\Http\Controllers\Backend\VarietyReportController;
use App\Http\Controllers\Backend\VarietySampleController;
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

    Route::get('/', function () {
        return view('frontend.pages.varieties');
    })->name('home');

    Route::get('/variety_report/name', function () {
        return view('frontend.pages.variety');
    });

    Route::get('/variety_report/name/sample/name', function () {
        return view('frontend.pages.sample');
    });
});


Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('backend.pages.dashboard');
    })->name('dashboard');

    Route::get('/variety-reports', [VarietyReportController::class, 'index'])->name('variety-reports.index');
    Route::get('/variety-reports/{id}', [VarietyReportController::class, 'show'])->name('variety-reports.show');
    Route::get('/variety-reports/{id}/edit', [VarietyReportController::class, 'edit'])->name('variety-reports.edit');
    Route::put('/variety-reports/{id}', [VarietyReportController::class, 'update'])->name('variety-reports.update');
    Route::delete('/variety-reports/{id}', [VarietyReportController::class, 'destroy'])->name('variety-reports.destroy');

    Route::get('/variety-samples/{id}', [VarietySampleController::class, 'show'])->name('variety-samples.show');


    // Grower Routes
    Route::get('/growers', [GrowerController::class, 'index'])->name('growers.index');
    Route::get('/growers/create', [GrowerController::class, 'create'])->name('growers.create');
    Route::post('/growers', [GrowerController::class, 'store'])->name('growers.store');
    Route::get('/growers/{grower}/edit', [GrowerController::class, 'edit'])->name('growers.edit');
    Route::put('/growers/{grower}', [GrowerController::class, 'update'])->name('growers.update');
    Route::delete('/growers/{grower}', [GrowerController::class, 'destroy'])->name('growers.destroy');
    Route::put('growers/{grower}/updatePassword', [GrowerController::class, 'updatePassword'])->name('growers.updatePassword');


    // Breeder Routes
    Route::get('/breeders', [BreederController::class, 'index'])->name('breeders.index');
    Route::get('/breeders/create', [BreederController::class, 'create'])->name('breeders.create');
    Route::post('/breeders', [BreederController::class, 'store'])->name('breeders.store');
    Route::get('/breeders/{breeder}/edit', [BreederController::class, 'edit'])->name('breeders.edit');
    Route::put('/breeders/{breeder}', [BreederController::class, 'update'])->name('breeders.update');
    Route::delete('/breeders/{breeder}', [BreederController::class, 'destroy'])->name('breeders.destroy');
    Route::put('breeders/{breeder}/updatePassword', [BreederController::class, 'updatePassword'])->name('breeders.updatePassword');
});


// Clear all caches
Route::get('/clear', function () {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    return "Cleared!";
});
