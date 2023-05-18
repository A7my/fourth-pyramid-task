<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiLoginController;
use App\Http\Controllers\Api\ApiGetOrderController;
use App\Http\Controllers\Api\ApiRegisterController;
use App\Http\Controllers\Api\ApiCancelOrderController;
use App\Http\Controllers\Api\ApiCreateOrderController;

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

Route::get('register' , [ApiRegisterController::class , 'register']);
Route::get('/login' , [ApiLoginController::class , 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('createOrder' , [ApiCreateOrderController::class , 'createOrder']);
    Route::get('cancelOrder' , [ApiCancelOrderController::class , 'cancelOrder']);
    Route::get('getOrders' , [ApiGetOrderController::class , 'getOrders']);

});


//1|uShejkPPr7Usk79Qna8GFE35EJ0ZKMCHdxNdA0WL
//2|3wnQ29PUZlksntlABGeG0blvFckoFX5Vykm3XtA6
