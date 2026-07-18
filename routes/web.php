<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\EconomicDataController;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\PortController;
use App\Http\Controllers\ShippingRouteController;
use App\Http\Controllers\RiskAnalysisController;

Route::get('/', [DashboardController::class, 'index']);

Route::get('/countries', [CountryController::class, 'index']);

Route::get('/economic-data', [EconomicDataController::class, 'index']);

Route::get('/weather', [WeatherController::class, 'index']);

Route::get('/news', [NewsController::class, 'index']);

Route::get('/currency', [CurrencyController::class, 'index']);

Route::get('/ports', [PortController::class, 'index']);

Route::get('/shipping-routes', [ShippingRouteController::class, 'index']);

Route::get('/risk-analysis', [RiskAnalysisController::class, 'index']);