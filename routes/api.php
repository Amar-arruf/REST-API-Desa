<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('desa',[VillageController::class,'index']);
Route::get('desa/{id}',[VillageController::class, 'show'])->where('id', '\d+');
Route::post('desa',[VillageController::class,'store']);
Route::put('desa/{id}',[VillageController::class,'update'])->where('id', '\d+');
Route::delete('desa/{id}',[VillageController::class,'destroy'])->where('id', '\d+');