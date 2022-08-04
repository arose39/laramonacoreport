<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\RacerInfoController;
use App\Http\Controllers\ReportController;
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

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/report', [ReportController::class, 'show'])->name('report');

Route::get('/report/racers', [RacerInfoController::class, 'showAll'])->name('racers');

Route::get('/report/racers/id={abbreviation}', [RacerInfoController::class, 'showOne'])->name('racer')
    ->where('abbreviation', '[a-zA-Z]{3}');

Route::prefix('adminpannel')->middleware(['admin'])->group(function () {
    Route::get('/', [AdminController::class, 'showPannel'])->middleware(['admin'])->name('adminpannel');
    Route::resource('users', UserController::class)->except(['show']);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/api/v1/documentation', function (){
    return view('documentation');
});

require __DIR__ . '/auth.php';
