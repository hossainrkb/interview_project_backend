<?php

use App\Http\Controllers\OfferController;
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
Route::group(['middleware' => ['auth:api']], function () {
    Route::post('user', [UserController::class, 'index']);
    Route::post('logout', [UserController::class, 'logoutApi']);

    Route::post('partner', [PartnerController::class, 'index']);
    Route::post('partner/store', [PartnerController::class, 'store']);
    Route::post('partner/{partner}/update', [PartnerController::class, 'update']);
    Route::post('partner/show/{partner}', [PartnerController::class, 'show']);
    Route::post('partner/{partner}/destroy', [PartnerController::class, 'destroy']);

    Route::post('partner/{partner}/offers/show', [OfferController::class, 'index']);
    Route::post('offer', [OfferController::class, 'list']);
    Route::post('partner/{partner}/offers/store', [OfferController::class, 'store']);
    Route::post('offer/{offer}/update', [OfferController::class, 'update']);
    Route::post('offer/show/{offer}', [OfferController::class, 'show']);
    Route::post('offer/{offer}/destroy', [OfferController::class, 'destroy']);
});
Route::post('register',[UserController::class,'store']);