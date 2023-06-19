<?php

use App\Http\Controllers\AuthController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


//? public routes start
//auth routes
Route::post('register', [AuthController::class , 'register']);
Route::post('login', [AuthController::class , 'login']);
//? public routes end
Route::get('current', [AuthController::class , 'getCurrentUser']);

//!secure routes start
Route::middleware('auth:api')->group(function (){
    Route::apiResource('users', UserController::class);
});
//!secure routes end

