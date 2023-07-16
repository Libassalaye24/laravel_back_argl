<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CycleController;
use App\Http\Controllers\NiveauController;

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


//!secure routes start
Route::middleware('auth:api')->group(function (){
    Route::apiResource('users', UserController::class);
    Route::get('/users/current/infos', [UserController::class , 'infoUser']);
    Route::get('/users/current/infos2', [UserController::class , 'updateInfos']);
    Route::get('/users/current/update', [UserController::class , 'updatePassword']);
});
//!secure routes end

Route::apiResource("cycles",CycleController::class)->except(["update","destroy"]);
Route::apiResource("niveaux",NiveauController::class)->only(["index","show","store"]);
Route::apiResource("classes",ClasseController::class)->only(["index","show","store"]);
