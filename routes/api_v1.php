<?php

use App\Http\Controllers\Api\V1\RacerInfoController;
use App\Http\Controllers\Api\V1\ReportController;
use App\Lib\ReportBuilderFacade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/





Route::get('/report', [ReportController::class, 'show']);

Route::get('/report/racers', [RacerInfoController::class, 'showAll']);

Route::get('/report/racers/id={abbreviation}', [RacerInfoController::class, 'showOne'])
    ->where('abbreviation', '[a-zA-Z]{3}');




