<?php

use App\Http\Controllers\competitorsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::middleware('throttle:80,1')->group(function () {
    Route::post('competitors/vote', [competitorsController::class,"vote"])->name("vote");
    Route::post('competitors/unvote', [competitorsController::class,"unvote"])->name("unvote");
});

