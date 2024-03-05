<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\VillageController;
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



Route::post('register',[AuthController::class,'register']);
Route::post('login',[AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group( function () {
    Route::post('logout', [AuthController::class, 'logout']);
});

Route::middleware('auth:sanctum')->get('desa',[VillageController::class,'index']);
Route::middleware('auth:sanctum')->get('desa/{id}',[VillageController::class, 'show'])->where('id', '\d+');
Route::middleware('auth:sanctum')->post('desa',[VillageController::class,'store']);
Route::middleware('auth:sanctum')->put('desa/{id}',[VillageController::class,'update'])->where('id', '\d+');
Route::middleware('auth:sanctum')->delete('desa/{id}',[VillageController::class,'destroy'])->where('id', '\d+');