<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\EconomicDataController;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\PortController;
use App\Http\Controllers\ShippingRouteController;
use App\Http\Controllers\RiskAnalysisController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ==========================
// LOGIN
// ==========================

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

// ==========================
// DASHBOARD
// ==========================

Route::get('/', [DashboardController::class, 'index'])
    ->name('dashboard');

Route::get('/user/dashboard', [UserDashboardController::class, 'index'])
    ->name('user.dashboard');

// ======================================================
// ROUTE KHUSUS ADMIN
// ======================================================

Route::middleware('admin')->group(function () {

    // =====================
    // Countries
    // =====================

    Route::get(
        'countries/import',
        [CountryController::class, 'import']
    )->name('countries.import');

    Route::resource('countries', CountryController::class);

    // =====================
    // Economic Data
    // =====================

    Route::get(
        'economic-data/import',
        [EconomicDataController::class, 'import']
    )->name('economic-data.import');

    Route::resource('economic-data', EconomicDataController::class);

    // =====================
    // Ports
    // =====================

    Route::resource('ports', PortController::class);

    // =====================
    // Shipping Routes
    // =====================

    Route::resource('shipping-routes', ShippingRouteController::class);

});

// =====================
// Monitoring
// =====================

// Cuaca
Route::get('/weather', [WeatherController::class, 'index'])
    ->name('weather.index');

// Berita
Route::get('/news', [NewsController::class, 'index'])
    ->name('news.index');

// Nilai Tukar
Route::get('/currency', [CurrencyController::class, 'index'])
    ->name('currency.index');

// ======================================================
// RISK ANALYSIS
// ======================================================

// Semua user boleh melihat daftar Risk Event
Route::get(
    '/risk-analysis',
    [RiskAnalysisController::class, 'index']
)->name('risk-analysis.index');

// Route CRUD hanya Admin
Route::middleware('admin')->prefix('risk-analysis')->name('risk-analysis.')->group(function () {

    // Form tambah
    Route::get('/create', [RiskAnalysisController::class, 'create'])
        ->name('create');

    // Simpan
    Route::post('/', [RiskAnalysisController::class, 'store'])
        ->name('store');

    // Form edit
    Route::get('/{risk}/edit', [RiskAnalysisController::class, 'edit'])
        ->name('edit');

    // Update
    Route::put('/{risk}', [RiskAnalysisController::class, 'update'])
        ->name('update');

    // Hapus
    Route::delete('/{risk}', [RiskAnalysisController::class, 'destroy'])
        ->name('destroy');

});