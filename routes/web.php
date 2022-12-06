<?php

use App\Http\Controllers\ReportController;
use App\Http\Middleware\RaceParamIsValid;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/', '/report');

Route::get('/report', [ReportController::class, 'index'])
    ->name('report.index')->middleware([RaceParamIsValid::class]);

Route::get('/report/drivers', [ReportController::class, 'drivers'])
    ->name('report.drivers')->middleware([RaceParamIsValid::class]);

Route::get('/report/driver/{driverId}', [ReportController::class, 'driver'])
    ->name('report.driver')->where(['driverId' => '[A-Z]{3}']);

