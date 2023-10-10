<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\eFluxController;
use App\Http\Controllers\api\ApiController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::apiResource("eflux", eFluxController::class);
// Route::get('/{parametre}/getdata', [eFluxController::class, 'dataSelect'])->name('eflux.data');
// Route::post('/{paramsave}/save', [eFluxController::class, 'saveData'])->name('eflux.save');
// Route::post('login', [eFluxController::class, 'login'])->name('eflux.login');
Route::get('map', [ApiController::class, 'map'])->name('map');
