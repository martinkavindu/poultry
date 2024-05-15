<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\ApiController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// api routes
Route::group(['prefix'=>'v1','namespace'=>'App\Http\Controllers\Api\V1'],function(){
Route::apiResource('orders',ApiController::class);

Route::post('register',[ApiController::class,'RegisterApi']);
Route::post('login',[ApiController::class,'LoginApi']);

//protected routes
Route::group([
    "middleware" =>["auth:api"]
],function(){
    Route::get('profile',[ApiController::class,'ProfileApi']);
    Route::get('logout',[ApiController::class,'LogoutApi']);
});

});