<?php

use App\Http\Controllers\PartnerController;
use App\Http\Controllers\UserController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['middleware' => ['api']], function () {
    Route::post('user', [UserController::class, 'index']);
    Route::post('partner', [PartnerController::class, 'index']);
    Route::post('partner/store', [PartnerController::class, 'store']);
    Route::post('partner/{partner}/update', [PartnerController::class, 'update']);
    Route::post('partner/show/{partner}', [PartnerController::class, 'show']);
    Route::post('partner/{partner}/destroy', [PartnerController::class, 'destroy']);
});
