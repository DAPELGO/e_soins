<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ApiController;
use App\Http\Controllers\api\eSoinsController;

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


Route::group(['prefix' => 'auth'], function () {
    Route::post('/login', [ApiController::class, 'login']);

    Route::group(['middleware' => 'auth:sanctum'], function() {
      Route::get('logout', [ApiController::class, 'logout']);
      Route::get('user', [ApiController::class, 'user']);
      Route::get('/factures', [eSoinsController::class, 'factures'])->name('esoins.factures');
      Route::post('/factures/store', [eSoinsController::class, 'storeFacture'])->name('factures.store');
      Route::get('/{parametre}/getdata', [eSoinsController::class, 'dataSelect'])->name('esoins.data');
      Route::get('/{id_parametre}/get_valeur', [eSoinsController::class, 'getValeur'])->name('esoins.valeur');
    });
});

Route::get('map', [ApiController::class, 'map'])->name('map');
